<?php
/**
Functions to calculate 
*/
/*$start = microtime(true);
// trial:
$vote_events = json_decode(file_get_contents("json/vote-events.json"));
$option_meaning = json_decode(file_get_contents("json/option-meaning.json"));
$issue = json_decode(file_get_contents("json/issue.json"));
$people = json_decode(file_get_contents("json/people.json"));
$partiesjson = json_decode(file_get_contents("json/parties.json"));
// about 0.08 sec.

$time_elapsed0 = microtime(true) - $start;

$voters = new stdClass();
$requirements = new stdClass();
$parties = new stdClass();

$group2party = new stdClass();
foreach ($partiesjson as $pkey => $party) {
  foreach ($party->children as $ckey => $child) {
    $group2party->$child = $pkey;
  }
}

$filtered = filter_vote_events($issue, $vote_events, "2013-01-01", "2013-12-31");

print_r($filtered);die();

foreach ($filtered->vote_events as $vekey => $ve) {
  foreach($vote_events->$vekey->votes as $vkey => $v) {
    $voter_id = $v->voter_id;
    $group_id = $v->group_id;
    $party_id = $group2party->$group_id;
    if (!isset($voters->$voter_id))
      $voters->$voter_id = new stdClass();
    if (!isset($parties->$party_id))
      $parties->$party_id = new stdClass();
    $voters->$voter_id->$vekey = $v->option;
    if (!isset($parties->$party_id->$vekey))
      $parties->$party_id->$vekey = [];
    array_push($parties->$party_id->$vekey, $v->option);
  }
  //print_r($vote_events->$vekey);die();
  $requirements->$vekey = $vote_events->$vekey->motion->requirement;
}
// about 0.005 sec.

$vv = "53e90837a874087103fa72aa";
print_r($parties->vv);die();

//print_r($voters);

foreach ($voters as $voter_id => $voter) {
  $m = person_match($voter, $issue->vote_events, $requirements, $option_meaning);
  //echo "{$voter_id}: {$m}<br/>\n";
}
// about 0.03 sec.

foreach ($parties as $party_id => $party) {
  $m = group_match($party, $issue->vote_events, $requirements, $option_meaning);
  echo "{$group_id}: {$m}<br/>\n";
}
*/

/**

*/
function person_identifier2id($identifier,$people) {
  foreach ($people as $person) {
    foreach ($person->identifiers as $ident) {
      if (($ident->scheme == "psp.cz/osoby") and ($ident->identifier == $identifier)) {
        return $person->id;
      }
    }
  }
  return False;
}

/**
Select subset of vote events

$start_date <= vote_event->start_date < $end_date
*/
function filter_vote_events($issue, $vote_events, $start_date, $end_date) {
  $out = $issue;
  foreach ($issue->vote_events as $vekey => $ve) {
    if (($vote_events->$vekey->start_date < $start_date) or ($vote_events->$vekey->start_date >= $end_date))
      unset($out->vote_events->$vekey);
  }
  return $out;
}


/**
Calculates person's match

options: vote options by the person
    they does not have to be complete comparing issue's vote_events
example (json notation):
$options = {
  '56558': absent,
  '53601': yes,
  ...
}

vote_events: (issue's) vote_events that shall be taken into account
    weights have default 1
example (json notation):
$vote_events = {
  '56558': {
    "weight": 56,
    "pro_issue": -1,
  },
  '53601: {
    "pro_issue": 1
  },
  ...
}

requirements: requirement to pass the vote-event
example (json notation):
$requirements = {
  "56558": "simple majority",
  "53601": "all representatives majority",
  ...
}

option_meaning: meaning of options depending on the requirement
example (json notation):
$option_meaning = {
  "simple majority": {
    "options": {
      "yes": 1,
      "no": -1,
      "abstain": -1,
      "not voting": -1,
      "absent": 0
    }
  },
  ...
}

lo_limit: lower limit, excludes voters with too few vote-events (being a MP only a while)

*/
function person_match($options, $vote_events, $requirements, $option_meaning, $lo_limit=0.1) {
  //print_r($options);die();
  $match = 0;
  $voter_max = 0;
  $max = 0;
  foreach ($vote_events as $vekey => $ve) {
    $requirement = $requirements->$vekey;
    $weight = (isset($ve->weight) ? $ve->weight : 1);
    if (isset( $options->$vekey)) {
      $option = $options->$vekey;
      $match += $ve->pro_issue * $option_meaning->$requirement->options->$option * $weight;
      $voter_max += $weight;
    }
    $max += $weight;
  }
  if ($voter_max > $lo_limit * $max) {
    return ($match/$voter_max + 1)*50;
  } else {
    return false;
  }
}

/**
Calculates group's (party's) match

group_options: list of vote options by the persons of the group
    they does not have to be complete comparing issue's vote_events
example (json notation):
$group_options = {
  '56558': ['absent','yes','no',...],
  '53601': ['yes']
  ...
}

The rest is the same as it is for person_match()

*/

function group_match($group_options, $vote_events, $requirements, $option_meaning, $lo_limit=0.1) {
  $match = 0;
  $voter_max = 0;
  $max = 0;
  foreach ($vote_events as $vekey => $ve) {
    $requirement = $requirements->$vekey;
    $weight = (isset($ve->weight) ? $ve->weight : 1);
    if (isset( $group_options->$vekey)) {
      $c = count($group_options->$vekey); //so $voter_max is comparable with $max
      echo "$c ";
      foreach ($group_options->$vekey as $option) {
        $match += $ve->pro_issue * $option_meaning->$requirement->options->$option * $weight / $c;
        $voter_max += $weight / $c;
      }
    }
    $max += $weight;
  }
  if ($voter_max > $lo_limit * $max) {
    return ($match/$voter_max + 1)*50;
  } else {
    return false;
  }
}



/*$time_elapsed = microtime(true) - $start;
echo "time: " . $time_elapsed0 . " " .$time_elapsed . "<br/>\n";*/
?>
