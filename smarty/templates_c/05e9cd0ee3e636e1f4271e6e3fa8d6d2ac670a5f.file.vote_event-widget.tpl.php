<?php /* Smarty version Smarty-3.0.7, created on 2014-08-25 13:42:34
         compiled from "../../smarty/templates/vote_event-widget.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143392906053fb20d16018d9-15200806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05e9cd0ee3e636e1f4271e6e3fa8d6d2ac670a5f' => 
    array (
      0 => '../../smarty/templates/vote_event-widget.tpl',
      1 => 1408961416,
      2 => 'file',
    ),
    '2042b9835ca3a3aaed53f2c722fee065ca55b149' => 
    array (
      0 => '../../smarty/templates/widget.tpl',
      1 => 1408961498,
      2 => 'file',
    ),
    '3c2f22956f511d74b0b7638942a5707dee2389cd' => 
    array (
      0 => '../../smarty/templates/vote_event.tpl',
      1 => 1408966951,
      2 => 'file',
    ),
    '899ad251fb192e13007421ec3dff92843fcd83a3' => 
    array (
      0 => '../../smarty/templates/vote_event-legend.tpl',
      1 => 1408964621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143392906053fb20d16018d9-15200806',
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
    <link rel="stylesheet" href="../css/widget.css">
    <base target="_parent" />   

    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="../js/d3.hemicycle_rosnicka.js"></script>
    <script src="../js/d3.tip.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
 
  </head>
  <body>

<?php $_template = new Smarty_Internal_Template("vote_event.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '143392906053fb20d16018d9-15200806';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-25 13:42:34
         compiled from "../../smarty/templates/vote_event.tpl" */ ?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/usr/local/lib/php/Smarty/plugins/modifier.date_format.php';
?><div class="vote-event">
  <h4><?php echo $_smarty_tpl->getVariable('vote_event')->value->name;?>
</h4>
  <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('vote_event')->value->start_date);?>

  <?php if (isset($_smarty_tpl->getVariable('vote_event',null,true,false)->value->links[0]->url)&&($_smarty_tpl->getVariable('vote_event')->value->links[0]->url!='')){?>, <a href="<?php echo $_smarty_tpl->getVariable('vote_event')->value->links[0]->url;?>
"><?php echo $_smarty_tpl->getVariable('vote_event')->value->motion->text;?>
&nbsp;<sup><i class="fa fa-external-link">&nbsp;</i></sup></a><?php }?>, <a href="http://www.psp.cz/sqw/hlasy.sqw?g=<?php echo $_smarty_tpl->getVariable('vote_event')->value->identifier;?>
"><?php echo $_smarty_tpl->getVariable('text')->value['vote_event'];?>
&nbsp;<sup><i class="fa fa-external-link">&nbsp;</i></sup></a>
  <div id="chart"></div>
  <div id="legend">
  <?php $_template = new Smarty_Internal_Template("vote_event-legend.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '201101113253fb212a7ae061-89616202';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-25 13:42:34
         compiled from "../../smarty/templates/vote_event-legend.tpl" */ ?>
<div class="row"><?php echo $_smarty_tpl->getVariable('issue')->value->author;?>
:</div>
<div class="row">
  <div class="col-sm-6"><i class="fa fa-star ko-color"> </i><?php echo $_smarty_tpl->getVariable('text')->value['legend_ko'];?>
</div>
  <div class="col-sm-6"><i class="fa fa-star ok-color"> </i><?php echo $_smarty_tpl->getVariable('text')->value['legend_ok'];?>
</div>
</div>
<div class="row">
<?php  $_smarty_tpl->tpl_vars['party'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('legend_parties')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['party']->key => $_smarty_tpl->tpl_vars['party']->value){
?>
  <i class="fa fa-user" style="color:<?php echo $_smarty_tpl->getVariable('party')->value->color;?>
">&nbsp;</i><?php echo $_smarty_tpl->getVariable('party')->value->abbreviation;?>
&nbsp;
<?php }} ?>
</div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "../../smarty/templates/vote_event-legend.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
  </div>
</div>
  
  
  <script type="text/javascript">
    var hemicycle = [{
      "n":[8,11,15,19,22,26,29,33,37],
      "gap": 1.20,
      "widthIcon": 0.39,
      "width": 400,
      "groups": <?php echo $_smarty_tpl->getVariable('parties')->value;?>

    }];
   /* Initialize tooltip */	
    tip = d3.tip().attr("class", "d3-tip").html(function(d) { 
      return "<span class=\'stronger\'>" + d["name"] + "</span><br>";
    }); 
          
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
    
    </script>

<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "../../smarty/templates/vote_event.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
  
  </body>
</html>
