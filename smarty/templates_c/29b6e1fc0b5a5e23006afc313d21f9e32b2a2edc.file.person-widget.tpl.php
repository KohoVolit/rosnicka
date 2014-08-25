<?php /* Smarty version Smarty-3.0.7, created on 2014-08-25 05:10:42
         compiled from "../../smarty/templates/person-widget.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142144557453faa932421a07-67753519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29b6e1fc0b5a5e23006afc313d21f9e32b2a2edc' => 
    array (
      0 => '../../smarty/templates/person-widget.tpl',
      1 => 1408895382,
      2 => 'file',
    ),
    '2042b9835ca3a3aaed53f2c722fee065ca55b149' => 
    array (
      0 => '../../smarty/templates/widget.tpl',
      1 => 1408912391,
      2 => 'file',
    ),
    '4cc762f2ddcc62229127b49a75ca14fc7a7283ee' => 
    array (
      0 => '../../smarty/templates/person.tpl',
      1 => 1408936235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142144557453faa932421a07-67753519',
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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="../css/widget.css">
    <base target="_parent" /> 
  </head>
  <body>

<?php $_template = new Smarty_Internal_Template("person.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '142144557453faa932421a07-67753519';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2014-08-25 05:10:42
         compiled from "../../smarty/templates/person.tpl" */ ?>
  <div class="person">
    <div style="background-color:<?php echo $_smarty_tpl->getVariable('person')->value['color'];?>
">
      <a href="<?php echo $_smarty_tpl->getVariable('person')->value['link'];?>
">
        <h2 title="<?php echo $_smarty_tpl->getVariable('person')->value['name'];?>
"><?php echo $_smarty_tpl->getVariable('person')->value['name'];?>
</h2>
        <div>
           <img width="170" height="216" title="$person['name']" alt="$person['name']" class="" src="<?php echo $_smarty_tpl->getVariable('person')->value['image'];?>
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
<?php /*  End of included template "../../smarty/templates/person.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
  
  </body>
</html>
