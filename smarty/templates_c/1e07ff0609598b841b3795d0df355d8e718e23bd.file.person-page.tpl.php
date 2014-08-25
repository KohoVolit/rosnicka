<?php /* Smarty version Smarty-3.0.7, created on 2014-08-26 01:05:14
         compiled from "../smarty/templates/person-page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195875890753fabd08dcd948-16364053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e07ff0609598b841b3795d0df355d8e718e23bd' => 
    array (
      0 => '../smarty/templates/person-page.tpl',
      1 => 1408916346,
      2 => 'file',
    ),
    '26f0757f5183c5af464d9c2775732ea33f7e91cf' => 
    array (
      0 => '../smarty/templates/page.tpl',
      1 => 1409007792,
      2 => 'file',
    ),
    '4ec5991073ba49696cdec286073d59dbac1f33f3' => 
    array (
      0 => '../smarty/templates/person_detailed.tpl',
      1 => 1408924480,
      2 => 'file',
    ),
    '8beb2d39587cead2278a45b2085a0f7adf98c9e6' => 
    array (
      0 => '../smarty/templates/person-detail-vote.tpl',
      1 => 1408927531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195875890753fabd08dcd948-16364053',
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

<?php $_template = new Smarty_Internal_Template("person_detailed.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '195875890753fabd08dcd948-16364053';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-26 01:05:14
         compiled from "../smarty/templates/person_detailed.tpl" */ ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header" id="infobox_header">
      <span>
        <img width="170" height="216" style="float:left;margin-right:10px" src="<?php echo $_smarty_tpl->getVariable('person')->value['image'];?>
">
      </span>
      <div class="row">
        <div class="col-md-8">  
          <ul id="infobox_info">
            <li><h1><strong><?php echo $_smarty_tpl->getVariable('person')->value['name'];?>
</strong></h1></li>
            <li><?php echo $_smarty_tpl->getVariable('text')->value['party'];?>
: <strong><?php echo $_smarty_tpl->getVariable('person')->value['party'];?>
</strong></li>
            <li><?php echo $_smarty_tpl->getVariable('text')->value['term'];?>
: <strong><?php echo $_smarty_tpl->getVariable('person')->value['term'];?>
</strong></li>
           <li style="font-size:2em"><strong><?php echo $_smarty_tpl->getVariable('text')->value['score'];?>
: <?php echo $_smarty_tpl->getVariable('person')->value['score'];?>
/100</strong></li>
          </ul>
        </div>
      </div>
    </div> <!-- /modal-header -->
      
    <div style="clear:both;"></div>
      
    <div class="infobox_content modal-body">
     <?php  $_smarty_tpl->tpl_vars['vote'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('detailed_votes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['vote']->iteration=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vote']->key => $_smarty_tpl->tpl_vars['vote']->value){
 $_smarty_tpl->tpl_vars['vote']->iteration++;
?>
       <?php if (!($_smarty_tpl->tpl_vars['vote']->iteration % 2)){?>
         <div class="row">
       <?php }?>
       <?php $_template = new Smarty_Internal_Template("person-detail-vote.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '100043575553fbc12ab0d114-56323193';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-26 01:05:14
         compiled from "../smarty/templates/person-detail-vote.tpl" */ ?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/usr/local/lib/php/Smarty/plugins/modifier.date_format.php';
?><div class="col-md-6 each_vote_container">
  <div class="panel panel-<?php if ($_smarty_tpl->getVariable('vote')->value->single_match==-1){?>danger<?php }elseif($_smarty_tpl->getVariable('vote')->value->single_match==1){?>success<?php }else{ ?>default<?php }?>">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo $_smarty_tpl->getVariable('vote')->value->name;?>
</h3>
      <?php if (isset($_smarty_tpl->getVariable('person',null,true,false)->value['gender'])){?>
        <?php if ($_smarty_tpl->getVariable('person')->value['gender']=='male'){?><?php echo $_smarty_tpl->getVariable('text')->value['voted_male'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('text')->value['voted_female'];?>
<?php }?><?php }else{ ?><?php echo $_smarty_tpl->getVariable('text')->value['voted'];?>
<?php }?>&nbsp;
        <i class="fa <?php if ($_smarty_tpl->getVariable('vote')->value->option_meaning==1){?>fa-thumbs-o-up<?php }elseif($_smarty_tpl->getVariable('vote')->value->option_meaning==-1){?>fa-thumbs-o-down<?php }else{ ?>fa-question<?php }?>"></i><small>&nbsp;(<?php echo $_smarty_tpl->getVariable('text')->value['vote_options'][$_smarty_tpl->getVariable('vote')->value->option];?>
)</small>, 
      <?php echo $_smarty_tpl->getVariable('issue')->value->author;?>
 <?php echo $_smarty_tpl->getVariable('text')->value['recommends'];?>
&nbsp;
	    <i class="fa <?php if ($_smarty_tpl->getVariable('vote')->value->pro_issue==1){?>fa-thumbs-o-up<?php }elseif($_smarty_tpl->getVariable('vote')->value->pro_issue==-1){?>fa-thumbs-o-down<?php }else{ ?>fa-question<?php }?>"></i>
	    <div><small>
	      <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('vote')->value->start_date);?>

	      <?php if (isset($_smarty_tpl->getVariable('vote',null,true,false)->value->links[0]->url)&&($_smarty_tpl->getVariable('vote')->value->links[0]->url!='')){?>, <a href="<?php echo $_smarty_tpl->getVariable('vote')->value->links[0]->url;?>
"><?php echo $_smarty_tpl->getVariable('vote')->value->motion->text;?>
</a><?php }?>
          <br/>
	      <?php echo $_smarty_tpl->getVariable('text')->value['weight'];?>
 (<?php echo $_smarty_tpl->getVariable('issue')->value->author;?>
): <?php echo $_smarty_tpl->getVariable('vote')->value->weight;?>

	      </small>
	    </div>
    </div>
    <div class="panel-body">
      <p><?php echo $_smarty_tpl->getVariable('vote')->value->description;?>
</p>
    </div>
  </div>
</div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "../smarty/templates/person-detail-vote.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
       <?php if (!($_smarty_tpl->tpl_vars['vote']->iteration % 2)){?>
         </div>
       <?php }?> 
     <?php }} ?>
     <div style="clear:both;margin-bottom: 20px;"></div>
    </div> <!-- /modal-body -->
      
  </div>
</div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "../smarty/templates/person_detailed.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
  
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  </body>
</html>
