<?php /* Smarty version Smarty-3.0.7, created on 2014-08-25 06:40:36
         compiled from "../smarty/templates/party-page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117117115953faacb6498695-82262499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90a369c2702bc3ba8fcd12c13171f704e33d6561' => 
    array (
      0 => '../smarty/templates/party-page.tpl',
      1 => 1408933852,
      2 => 'file',
    ),
    '26f0757f5183c5af464d9c2775732ea33f7e91cf' => 
    array (
      0 => '../smarty/templates/page.tpl',
      1 => 1408941631,
      2 => 'file',
    ),
    '51471efc22d0b8d2936276c75fd3c85d8a90c11e' => 
    array (
      0 => '../smarty/templates/party_detailed.tpl',
      1 => 1408937002,
      2 => 'file',
    ),
    'da0d78f069e88b9f8c83580cb91082588e3a333b' => 
    array (
      0 => '../smarty/templates/person.tpl',
      1 => 1408936440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117117115953faacb6498695-82262499',
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
<input type="text" placeholder="Hledej..." class="form-control input-lg non-opaque" id="search-input">
<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
</div>
</div>
</div>
</div>

<?php $_template = new Smarty_Internal_Template("party_detailed.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '117117115953faacb6498695-82262499';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-25 06:40:36
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
$_template->properties['nocache_hash']  = '184889214753fabe442ac102-16855238';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-25 06:40:36
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
