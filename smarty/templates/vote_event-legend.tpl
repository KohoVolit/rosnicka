<div class="row">{$issue->author}:</div>
<div class="row">
  <div class="col-sm-6"><i class="fa fa-star ko-color"> </i>{$text['legend_ko']}</div>
  <div class="col-sm-6"><i class="fa fa-star ok-color"> </i>{$text['legend_ok']}</div>
</div>
<div class="row">
{foreach $legend_parties as $party}
  <i class="fa fa-user" style="color:{$party->color}">&nbsp;</i>{$party->abbreviation}&nbsp;
{/foreach}
</div>
