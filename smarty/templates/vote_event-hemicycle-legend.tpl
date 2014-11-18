<div class="row">
  <p class="text-center">{$issue->author} {$text['recommends']}: <strong>{$text['pro_issue'][$vote_event->pro_issue]}</strong></p>
</div>

<div class="row">
  <div class="col-sm-6">
    <i class="fa fa-star ko-color"> </i>{$text['legend_ko']} <small>(<i>{$text['pro_issue'][$vote_event->pro_issue*(-1)]}</i>)</small>
  </div>
  <div class="col-sm-6">
    <i class="fa fa-star ok-color"> </i>{$text['legend_ok']} <small>(<i>{$text['pro_issue'][$vote_event->pro_issue]}</i>)</small>
  </div>
</div>
 <hr/>
<div class="row" style="margin: 0">
{$text['legend']}:<br/>
<p class="text-center">
{foreach $parties as $party}
  <i class="fa fa-user" style="color:{$party->color}">&nbsp;</i>{$party->abbreviation}&nbsp;
{/foreach}
</p>
</div>
