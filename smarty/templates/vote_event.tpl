<div class="vote-event">
  <h4>{$vote_event->name}</h4>
  {$vote_event->start_date|date_format}
  {if isset($vote_event->links[0]->url) and ($vote_event->links[0]->url != '')}, <a href="{$vote_event->links[0]->url}">{$vote_event->motion->text}&nbsp;<sup><i class="fa fa-external-link">&nbsp;</i></sup></a>{/if}, <a href="http://www.psp.cz/sqw/hlasy.sqw?g={$vote_event->identifier}">{$text['vote_event']}&nbsp;<sup><i class="fa fa-external-link">&nbsp;</i></sup></a>
  <div id="chart"></div>
  <div id="legend">
  {include "vote_event-legend.tpl"}
  </div>
</div>
  
  
  <script type="text/javascript">
    var hemicycle = [{
      "n":[8,11,15,19,22,26,29,33,37],
      "gap": 1.20,
      "widthIcon": 0.39,
      "width": 400,
      "groups": {$parties}
    }];
   /* Initialize tooltip */	
    tip = d3.tip().attr("class", "d3-tip").html(function(d) { 
      return "<span class=\'stronger\'>" + d["name"] + "</span><br>";
    }); 
         {literal} 
    var w=400,h=205,
        svg=d3.select("#chart")
            .append("svg")
            .attr("width",w)
            .attr("height",h);
    var hc = d3.hemicycle()
                .n(function(d) {return d.n;})
                .gap(function(d) {return d.gap;})
                .widthIcon(function(d) {return d.widthIcon;})
                .width(function(d) {return d.width;})
                .groups(function(d) {return d.groups;});  
    
    var item = svg.selectAll(".hc")
          .data(hemicycle)
       .enter()
        .append("svg:g")
        .call(hc);
        
	/* Invoke the tip in the context of your visualization */
    svg.call(tip);
	
	// Add tooltip div
    var div = d3.select("body").append("div")
    .attr("class", "tooltip")
    .style("opacity", 1e-6);
    {/literal}
    </script>

