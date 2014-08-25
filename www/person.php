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

$person_id = person_identifier2id($_GET['identifier'],$people);

// prepare voter's options (votes):
$requirements = new stdClass();
$options = new stdClass(); //for calculating score
$detailed_votes = []; //for detailed display
foreach ($issue->vote_events as $vekey => $ve) {
  foreach($vote_events->$vekey->votes as $vkey => $v) {
    if ($v->voter_id == $person_id) {
      $options->$vekey = $v->option;
      $this_group_id = $v->group_id;
      
      $vote = (object)array_merge((array)$vote_events->$vekey, (array)$ve);
      unset($vote->votes);
      $vote->option = $v->option;
      $vote->single_match = single_match($vote->option,$vote->pro_issue,$option_meaning,$vote->motion->requirement);
      $req = $vote->motion->requirement;
      $vot = $v->option;
      $vote->option_meaning = $option_meaning->$req->options->$vot;

      $detailed_votes[] = $vote;
      break; 
    }
  }
  $requirements->$vekey = $vote_events->$vekey->motion->requirement;
  // for finding party:
  if (!isset($last_vote_event))
    $last_vote_event = $vote_events->$vekey;
  if ($vote_events->$vekey->start_date > $last_vote_event->start_date)
    if (isset($this_group_id))
      $last_group_id = $this_group_id;
}

// last party
$party = group2party($last_group_id,$partiesjson);

// score 
$score = person_match($options, $issue->vote_events, $requirements, $option_meaning);

// sort detailed votes by date
usort($detailed_votes, function($a, $b) {
    return strtotime($b->start_date) - strtotime($a->start_date);
});

// term
$default_term = ['identifier' => '', 'name' => $text['all_terms']];
if (isset($_GET['term']))
  $term = term2term($_GET['term'],$header['terms'],$default_term);
else
  $term = $default_term;

//person
$person = [
  'name' => $people->$person_id->name,
  'score' => round($score),
  'party' => $party->name,
  'image' => 'http://www.psp.cz/eknih/cdrom/2010ps/eknih/2010ps/poslanci/i'.$_GET['identifier'].".jpg",
  'term' => $term['name'],
];
if (isset($people->$person_id->gender))
  $person['gender'] = $people->$person_id->gender;


//smarty
$smarty->assign('header',$header);
$smarty->assign('text',$text);

$smarty->assign('issue',$issue);
$smarty->assign('person',$person);
$smarty->assign('detailed_votes',$detailed_votes);
$smarty->assign('title',$people->$person_id->name . ': ' .$person['score'] . '/100' . ' | ' . $issue->title);


$smarty->display('person-page.tpl');






function group2party($group_id,$partiesjson) {
    foreach ($partiesjson as $pkey => $party) {
      foreach ($party->children as $ckey => $child) {
        if ($child == $group_id)
          return $party;
      }
    }
    return false;
}


?>
