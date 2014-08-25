<?php /* Smarty version Smarty-3.0.7, created on 2014-08-26 01:03:14
         compiled from "../smarty/templates/party-page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97451035553fbbcd62a3058-49924390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90a369c2702bc3ba8fcd12c13171f704e33d6561' => 
    array (
      0 => '../smarty/templates/party-page.tpl',
      1 => 1409006256,
      2 => 'file',
    ),
    '26f0757f5183c5af464d9c2775732ea33f7e91cf' => 
    array (
      0 => '../smarty/templates/page.tpl',
      1 => 1409007792,
      2 => 'file',
    ),
    '51471efc22d0b8d2936276c75fd3c85d8a90c11e' => 
    array (
      0 => '../smarty/templates/party_detailed.tpl',
      1 => 1409007375,
      2 => 'file',
    ),
    '6900b4111d752df952df31db5beaeb4468920852' => 
    array (
      0 => '../smarty/templates/chart.tpl',
      1 => 1409007574,
      2 => 'file',
    ),
    '5f59e5af56bdd0e6b840bf38f0488c6db4225274' => 
    array (
      0 => '../smarty/templates/chart-variables.tpl',
      1 => 1409007129,
      2 => 'file',
    ),
    'da0d78f069e88b9f8c83580cb91082588e3a333b' => 
    array (
      0 => '../smarty/templates/person.tpl',
      1 => 1408936440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97451035553fbbcd62a3058-49924390',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('text')->value['lang'];?>
">
  <head>
    <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/united/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/page.css">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="http://d3js.org/d3.v3.js"></script>
 
  </head>
  <body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="container">
<div class="well opaque">
<div class="form-group col-md-8" style="float:none">
  <div class="input-group">
<input type="text" placeholder="Hledat lidi, strany ..." class="form-control input-lg non-opaque" id="search-input">
<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
</div>
</div>
</div>
</div>

<?php $_template = new Smarty_Internal_Template("party_detailed.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '97451035553fbbcd62a3058-49924390';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-26 01:03:14
         compiled from "../smarty/templates/party_detailed.tpl" */ ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header" id="infobox_header">
      <span>
        <img width="170" height="170" style="float:left;margin-right:10px" src="<?php echo $_smarty_tpl->getVariable('party')->value['image'];?>
">
      </span>
      <div class="row">
        <div class="col-md-8">  
          <ul id="infobox_info">
            <li><h1><strong><?php echo $_smarty_tpl->getVariable('party')->value['name'];?>
</strong></h1></li>
            <li><strong><?php echo $_smarty_tpl->getVariable('party')->value['party']->abbreviation;?>
</strong></li>
            <li><?php echo $_smarty_tpl->getVariable('text')->value['term'];?>
: <strong><?php echo $_smarty_tpl->getVariable('party')->value['term'];?>
</strong></li>
           <li style="font-size:2em"><strong><?php echo $_smarty_tpl->getVariable('text')->value['score'];?>
: <?php echo $_smarty_tpl->getVariable('party')->value['score'];?>
/100</strong></li>
          </ul>
          <div id="chart"></div>
      <?php $_template = new Smarty_Internal_Template("chart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '130343730953fbc0b2e52e56-18545442';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-26 01:03:14
         compiled from "../smarty/templates/chart.tpl" */ ?>
<script>
<?php $_template = new Smarty_Internal_Template("chart-variables.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '182812959653fbc0b2e74d29-36779829';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-26 01:03:14
         compiled from "../smarty/templates/chart-variables.tpl" */ ?>
var data = {
  "series": <?php echo $_smarty_tpl->getVariable('series')->value;?>

}
    options = <?php echo $_smarty_tpl->getVariable('chart_options')->value;?>
;
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "../smarty/templates/chart-variables.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>

//limits:
var limits = {
  'start_date': 9999,
  'end_date': 0,
  'maxsize': 0,
  'minsize': 1000000000000,
}
var yearso = {};
for (key in data['series']){
  serie = data['series'][key];
  for (k in serie["data"]) {
    datum = serie["data"][k];
    if (datum['x'] < limits['start_date'])
      limits['start_date'] = datum['x'];
    if (datum['x'] > limits['end_date'])
      limits['end_date'] = datum['x'];
    if (typeof(datum["size"]) !== "undefined") po = datum["size"];
      else po = 1;
    if (po > limits['maxsize'])
      limits['maxsize'] = po;
    if (po < limits['minsize'])
      limits['minsize'] = po;
    
    yearso[datum['x']] = datum['x'];
  }
  
}
years = [];
for (year in yearso) {
  years.push(year);
}


var margin = {top: 20, right: 20, bottom: 30, left: 50},
    width = options['width'] - margin.left - margin.right,
    height = options['height'] - margin.top - margin.bottom;

var x = d3.scale.linear()
    .range([0, width])
    .domain([limits['start_date']-0.25,limits['end_date']+0.25]);
var y = d3.scale.linear()
    .range([height, 0])
    .domain([0,100]);
var r = d3.scale.sqrt()
    .range([0, options['height']/20])
    .domain([0,limits['maxsize']]);    
 
var xAxis = d3.svg.axis()
    .scale(x)
    .tickValues(years)
    .tickFormat(d3.format("d"))
    .orient("bottom");
var yAxis = d3.svg.axis()
    .scale(y)
    .ticks(3)
    .orient("left");

var svg = d3.select("#chart").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    
svg.append("g")
  .attr("class", "x axis")
  .attr("transform", "translate(0," + height + ")")
  .call(xAxis)
 .append("text")
  .attr("x", x(limits['end_date']))
  .attr("y", "-1em")
  .style("text-anchor", "end")
  .text(options['xlabel']);
  
svg.append("g")
  .attr("class", "y axis")
  .call(yAxis)
 .append("text")
  .attr("transform", "rotate(-90)")
  .attr("y", 6)
  .attr("dy", ".71em")
  .style("text-anchor", "end")
  .text(options['ylabel']);

var line = d3.svg.line()
    .x(function(d) { return x(d.x); })
    .y(function(d) { return y(d.y); });

//prepare points:
points = [];
for (key in data['series']){
  serie = data['series'][key];
  for (k in serie["data"]) {
    datum = serie["data"][k];
    point = {
      "x": datum["x"],
      "y": datum["y"],
      "name": serie["name"]
    }
    if (typeof(datum["color"]) !== "undefined") point["color"] = datum["color"];
    else if (typeof(serie["color"]) !== "undefined") point["color"] = serie["color"];
    else point["color"] = "gray";
    if (typeof(datum["size"]) !== "undefined") point["size"] = datum["size"];
    else point["size"] = 1;
    points.push(point);
  }
}
//prepare lines:
lines = [];
for (key in data['series']){
  serie = data['series'][key];
  for (k in serie["data"]) {
    datum = serie["data"][k];
    point = {
      "x": datum["x"],
      "y": datum["y"],
    }
    if ((typeof(serie["data"][k-1]) !== "undefined") && (serie["data"][k-1]["x"] + 1 == datum["x"])) {
      point1 = {
        "x": datum["x"],
        "y": datum["y"],
      }
      point0 = {
        "x": serie["data"][k-1]["x"],
        "y": serie["data"][k-1]["y"],
      }
      if (typeof(serie["data"][k-1]["size"]) === "undefined")
        siz = 1;
      else if (typeof(datum["size"]) === "undefined")
        siz = 1;
      else siz = Math.min(serie["data"][k-1]["size"],datum["size"]);
      point0["size"] = siz;
      if (typeof(datum["color"]) !== "undefined") point0["color"] = datum["color"];
      else if (typeof(serie["color"]) !== "undefined") point0["color"] = serie["color"];
      else point0["color"] = "gray";
      lines.push([point0,point1]);
    }
  }
}

//prepare bands
bands = [
  [[limits['start_date']-0.25,0],[limits['end_date']+0.25,0],[limits['end_date']+0.25,33.33],[limits['start_date']-0.25,33.33]],
  [[limits['start_date']-0.25,100],[limits['end_date']+0.25,100],[limits['end_date']+0.25,66.66],[limits['start_date']-0.25,66.66]],
];

var area = d3.svg.line()
    .x(function(d) {return x(d[0]);})
    .y(function(d) {return y(d[1]);});
    
var areas = svg.selectAll("path.area")
    .data(bands)
  .enter()
    .append("path")
      .attr("class",function(d, i) {if (i == 0) return "band band-lower"; else return "band band-upper";})
      .attr("d",area);


svg.selectAll('.lines')
    .data(lines)
  .enter().append('path')
    .attr("d", function(d) { return line(d); })
    .attr("class","line")
    .attr("stroke",function(d) { return d[0]['color']; })
    .attr("stroke-linecap","round")
    .attr("style", function(d) { return "stroke-width:" + Math.round(2*r(d[0]['size'])) + "px"; });

svg.selectAll('circle')
    .data(points)
  .enter().append('circle')
    .attr("cx", function(d) {return x(d.x) })
    .attr("cy", function(d) {return y(d.y) })
    .attr("r", function(d) {return r(d.size) })
    .attr("fill", function(d) {return d.color })
    .attr("stroke", function(d) {return d.color })
    .attr("stroke-width", function(d) {if (d.size > 0.5*limits['maxsize']) return 2; else if (d.size > 0.25*limits['maxsize']) return 1; else return 0;})
    .attr("title",function(d) {return d.name}); 


</script>

<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "../smarty/templates/chart.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
        </div>
      </div>
      
    </div> <!-- /modal-header -->
    
    <div style="clear:both;"></div>
      
    <div class="infobox_content modal-body">
     <?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('members')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['person']->iteration=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value){
 $_smarty_tpl->tpl_vars['person']->iteration++;
?>
       <?php if (!($_smarty_tpl->tpl_vars['person']->iteration % 4)){?>
         <div class="row">
       <?php }?>
       <div class="col-md-3 each_vote_container">
         <?php $_template = new Smarty_Internal_Template("person.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '130343730953fbc0b2e52e56-18545442';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-26 01:03:14
         compiled from "../smarty/templates/person.tpl" */ ?>
  <div class="person">
    <div style="background-color:<?php echo $_smarty_tpl->getVariable('person')->value['color'];?>
">
      <a href="<?php echo $_smarty_tpl->getVariable('person')->value['link'];?>
">
        <h2 title="<?php echo $_smarty_tpl->getVariable('person')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('person')->value['name'];?>
</h2>
        <div>
           <img width="170" height="216" title="<?php echo $_smarty_tpl->getVariable('person')->value['name'];?>
" alt="<?php echo $_smarty_tpl->getVariable('person')->value['name'];?>
" class="" src="<?php echo $_smarty_tpl->getVariable('person')->value['image'];?>
" style="display: inline;">
            <div class="score"><?php echo $_smarty_tpl->getVariable('person')->value['score'];?>
</div>
        </div>
      </a>
      <div class="person-party"><?php echo $_smarty_tpl->getVariable('person')->value['party'];?>
</div>
    </div>
  </div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "../smarty/templates/person.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
       </div>
       <?php if (!($_smarty_tpl->tpl_vars['person']->iteration % 4)){?>
         </div>
       <?php }?> 
     <?php }} ?>
     <div style="clear:both;margin-bottom: 20px;"></div>
    </div> <!-- /modal-body -->

  </div>
</div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "../smarty/templates/party_detailed.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
  
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  </body>
</html>
