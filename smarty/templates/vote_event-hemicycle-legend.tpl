<div class="row">
  {$issue->author} {$text['recommends']}: <strong>{$text['pro_issue'][$vote_event->pro_issue]}</strong>
</div>

<div class="row">
  <div class="col-sm-6">
    <i class="fa fa-star ko-color"> </i>{$text['legend_ko']} <small>(<i>{$text['pro_issue'][$vote_event->pro_issue*(-1)]}</i>)</small>
  </div>
  <div class="col-sm-6">
    <i class="fa fa-star ok-color"> </i>{$text['legend_ok']} <small>(<i>{$text['pro_issue'][$vote_event->pro_issue]}</i>)</small>
  </div>
</div>

<div class="row">
{foreach $parties as $party}
  <i class="fa fa-user" style="color:{$party->color}">&nbsp;</i>{$party->abbreviation}&nbsp;
{/foreach}
</div>
