<?php

// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('../../smarty/templates/');
$smarty->setCompileDir('../../smarty/templates_c');

include_once("../functions.php");
include_once("../text.php");

$vote_events = json_decode(file_get_contents("../json/vote-events.json"));
$option_meaning = json_decode(file_get_contents("../json/option-meaning.json"));
$issue = json_decode(file_get_contents("../json/issue.json"));
$people = json_decode(file_get_contents("../json/people.json"));
$partiesjson = json_decode(file_get_contents("../json/parties.json"));

/* hot fixes */
$issue->author = 'Zelený kruh';

$ve_id = trim($_GET['identifier']);

$parties = [];

$group2party = new stdClass();
foreach ($partiesjson as $pkey => $party) {
  foreach ($party->children as $ckey => $child) {
    $group2party->$child = $pkey;
  }
}

foreach($vote_events->$ve_id->votes as $vkey => $v) {
  $voter_id = $v->voter_id;
  $group_id = $v->group_id;
  $party_id = $group2party->$group_id;
  if (!isset($parties[$party_id])) {
    $parties[$party_id] = $partiesjson->$party_id;
    $parties[$party_id]->people = [];
  }
  $p = new stdClass();
  $p->link = '../person.php?identifier='.person_id2identifier($voter_id,$people); //no term ??
  $p->name = $people->$voter_id->name;
  //print_r($v);die();
  $p->single_match = single_match($v->option,$issue->vote_events->$ve_id->pro_issue,$option_meaning,$vote_events->$ve_id->motion->requirement);
  $p->option = $text['vote_options'][$v->option];
  $p->background = single_match2color($p->single_match);
  $p->opacity = single_match2opacity($p->single_match);
  $parties[$party_id]->people[] = $p;
}


// sort parties by position
usort($parties, function($a, $b) {
  return $a->position - $b->position;
});

foreach ($parties as $key=>$party) {
  usort($parties[$key]->people, function($a, $b) {
    return $a->single_match - $b->single_match;
  });
}

//parties are not good enough (for chart), let's make virtual parties
$virtualparties = [];

foreach($parties as $party) {
  foreach ([-1,0,1] as $sm) {
    $nparty = clone $party;
    unset($nparty->people);
    $nparty->single_match = $sm;
    $virtualparties[] = $nparty;
  }
}

foreach ($parties as $key => $party) {
  $virtualparties[3*$key]->people = [];
  $virtualparties[3*$key+1]->people = [];
  $virtualparties[3*$key+2]->people = [];
  foreach ($party->people as $person) {
    $virtualparties[3*$key+1+$person->single_match]->people[] = $person;
  }
}

usort($virtualparties, function($a, $b) {
  return ($a->single_match - $b->single_match)*1000 + $a->position - $b->position;
});


//vote event
$vote_event = (object)array_merge((array)$issue->vote_events->$ve_id, (array)$vote_events->$ve_id);

$smarty->assign('text',$text);
$smarty->assign('title',$issue->vote_events->$ve_id->name);
$smarty->assign('vote_event',$vote_event);
$smarty->assign('issue',$issue);

$smarty->assign('parties',json_encode($virtualparties));
$smarty->assign('legend_parties',$parties);


$smarty->display('vote_event-widget.tpl');



?>
