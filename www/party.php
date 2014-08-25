<?php
// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('../smarty/templates/');
$smarty->setCompileDir('../smarty/templates_c');

include_once("functions.php");
include_once("text.php");

/* hot fixes */
$header = [
  'name' => 'Poslanecká rosnička',
  'terms' => [
    ['identifier' => 6, 'name' => '2010 - 2013'],
  ],
  'link_without_term' => 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?'.strip_term($_GET),
];

$vote_events = json_decode(file_get_contents("./json/vote-events.json"));
$option_meaning = json_decode(file_get_contents("./json/option-meaning.json"));
$issue = json_decode(file_get_contents("./json/issue.json"));
$people = json_decode(file_get_contents("./json/people.json"));
$partiesjson = json_decode(file_get_contents("./json/parties.json"));

/* hot fixes */
$issue->author = 'Zelený kruh';

$requirements = new stdClass();
$parties = new stdClass(); //for calculating score
$voters = new stdClass();
$parties_members = []; //for detailed display

$group2party = new stdClass();
foreach ($partiesjson as $pkey => $party) {
  foreach ($party->children as $ckey => $child) {
    $group2party->$child = $pkey;
  }
}

foreach ($issue->vote_events as $vekey => $ve) {
  foreach($vote_events->$vekey->votes as $vkey => $v) {
    $voter_id = $v->voter_id;
    $group_id = $v->group_id;
    $party_id = $group2party->$group_id;
    if (!isset($voters->$voter_id))
      $voters->$voter_id = new stdClass();
    $voters->$voter_id->$vekey = $v->option;
    if (!isset($parties->$party_id)) {
      $parties->$party_id = new stdClass();
      $parties_members[$party_id] = [];
    }
    if (!isset($parties->$party_id->$vekey))
      $parties->$party_id->$vekey = [];
    array_push($parties->$party_id->$vekey, $v->option);
    $parties_members[$party_id][$voter_id] = $voter_id;
  }
  //print_r($vote_events->$vekey);die();
  $requirements->$vekey = $vote_events->$vekey->motion->requirement;
}

$score = group_match($parties->$_GET['party'], $issue->vote_events, $requirements, $option_meaning);

// term
$default_term = ['identifier' => '', 'name' => $text['all_terms']];
if (isset($_GET['term']))
  $term = term2term($_GET['term'],$header['terms'],$default_term);
else
  $term = $default_term;

// party
$party = [
  'name' => $partiesjson->$_GET['party']->name,
  'score' => round($score),
  'party' => $partiesjson->$_GET['party'],
  'image' => './image/party/'.$_GET['party'].".png",
  'term' => $term['name'],
];

// members
$members = [];
foreach ($parties_members[$_GET['party']] as $voter_id) {
  $p = [];
  $p['score'] = round(person_match($voters->$voter_id, $issue->vote_events, $requirements, $option_meaning));
  $identifier = person_id2identifier($voter_id,$people);
  $p['link'] = 'person.php?identifier='.$identifier; //no term yet!!
  $p['count'] = count((array)$voters->$voter_id);
  $p['name'] = $people->$voter_id->name;
  $p['color'] = score2color($p['score']);
  $p['image'] = 'http://www.psp.cz/eknih/cdrom/2010ps/eknih/2010ps/poslanci/i'.$identifier.".jpg";
  $p['party'] = '';//$partiesjson->$_GET['party']->abbreviation;
  $members[] = $p;
}

// sort detailed votes by date
usort($members, function($a, $b) {
    return ($b['count'] - $a['count'])*1000 + ($b['score'] - $a['score']) ;
});

// by years
$years = [];
foreach ($issue->vote_events as $vekey => $ve) {
  $y = date('Y', strtotime($vote_events->$vekey->start_date));
  $years[$y] = $y;
}
sort($years);
$year_scores = [];
foreach ($years as $year) {
  $filtered = filter_vote_events($issue, $vote_events, $year.'-01-01', $year.'-12-31');
  $sc = round(group_match($parties->$_GET['party'], $filtered->vote_events, $requirements, $option_meaning));
  //last vote event:
  $voted = 0;
  foreach ($filtered->vote_events as $vekey => $ve) {
    foreach ($vote_events->$vekey->votes as $vkey => $v) {
      if (in_array($v->group_id,$partiesjson->$_GET['party']->children))
        $voted++;
    }
  }
  
  $ys = new stdClass();
  $ys->x= (integer) $year;
  $ys->y= $sc;
  $ys->size= ceil($voted/count((array)$filtered->vote_events));
  $year_scores[] = $ys;
}

$ser = new stdClass();
$ser->name = $partiesjson->$_GET['party']->name;
$ser->title = $partiesjson->$_GET['party']->abbreviation;
$ser->color = $partiesjson->$_GET['party']->color;
$ser->data = $year_scores;

$series = [];
$series[] = $ser;
$chart_options = new stdClass();
$chart_options->width = 500;
$chart_options->height = 100;
$chart_options->ylabel = $text['score'];
$chart_options->xlabel = $text['year'];

$smarty->assign('series',json_encode($series));
$smarty->assign('chart_options',json_encode($chart_options));
$smarty->assign('header',$header);
$smarty->assign('party',$party);
$smarty->assign('text',$text);
$smarty->assign('members',$members);
$smarty->assign('title',$partiesjson->$_GET['party']->name);
$smarty->assign('color',score2color(round($score)));
$smarty->assign('link',"#");

$smarty->display('party-page.tpl');
?>
