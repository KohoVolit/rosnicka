<?php


// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('../../smarty/templates/');
$smarty->setCompileDir('../../smarty/templates_c');

include_once("../functions.php");

$vote_events = json_decode(file_get_contents("../json/vote-events.json"));
$option_meaning = json_decode(file_get_contents("../json/option-meaning.json"));
$issue = json_decode(file_get_contents("../json/issue.json"));
$people = json_decode(file_get_contents("../json/people.json"));
$partiesjson = json_decode(file_get_contents("../json/parties.json"));

$person_id = person_identifier2id($_GET['identifier'],$people);

$requirements = new stdClass();
$options = new stdClass();
foreach ($issue->vote_events as $vekey => $ve) {
  foreach($vote_events->$vekey->votes as $vkey => $v) {
    if ($v->voter_id == $person_id) {
      $options->$vekey = $v->option;
      $this_group_id = $v->group_id;
      break; 
    }
  }
  $requirements->$vekey = $vote_events->$vekey->motion->requirement;
  if (!isset($last_vote_event))
    $last_vote_event = $vote_events->$vekey;
  if ($vote_events->$vekey->start_date > $last_vote_event->start_date)
    $last_group_id = $this_group_id;
}

$party = group2party($last_group_id,$partiesjson);

$score = person_match($options, $issue->vote_events, $requirements, $option_meaning);

//person
$person = [
  'name' => $people->$person_id->name,
  'score' => round($score),
  'party' => $party->name,
  'image' => 'http://www.psp.cz/eknih/cdrom/2010ps/eknih/2010ps/poslanci/i'.$_GET['identifier'].".jpg",
  'link' => '#',
];

$smarty->assign('text',['lang'=>'cs']);
$smarty->assign('title',$people->$person_id->name);

$smarty->assign('person',$person);


$smarty->display('person-widget.tpl');




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
