<?php /* Smarty version Smarty-3.0.7, created on 2014-08-25 04:37:11
         compiled from "../smarty/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125215014853faa157747565-65351276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '451fc29e718cd3a5da70395e81cd33dd71752dc2' => 
    array (
      0 => '../smarty/templates/header.tpl',
      1 => 1408928652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125215014853faa157747565-65351276',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a href="../" class="navbar-brand"><?php echo $_smarty_tpl->getVariable('header')->value['name'];?>
</a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-main">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><?php echo $_smarty_tpl->getVariable('text')->value['terms'];?>
 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo $_smarty_tpl->getVariable('header')->value['link_without_term'];?>
"><?php echo $_smarty_tpl->getVariable('text')->value['all_terms'];?>
</a></li>
            <li class="divider"></li>
            <?php  $_smarty_tpl->tpl_vars['term'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('header')->value['terms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['term']->key => $_smarty_tpl->tpl_vars['term']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['term']->key;
?>
            <li><a href="<?php echo $_smarty_tpl->getVariable('header')->value['link_without_term'];?>
&term=<?php echo $_smarty_tpl->tpl_vars['term']->value['identifier'];?>
"><?php echo $_smarty_tpl->tpl_vars['term']->value['name'];?>
</a></li>
            <?php }} ?>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./about"><?php echo $_smarty_tpl->getVariable('text')->value['about'];?>
</a></li>
      </ul>
    </div>
  </div>
</div>
