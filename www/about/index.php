<?php
/**
about
*/

// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('../../smarty/templates/');
$smarty->setCompileDir('../../smarty/templates_c');

include_once("../functions.php");
include_once("../text.php");

$html = file_get_contents("methodology.html");

/* hot fixes */
$header = [
  'name' => 'Poslanecká rosnička',
  'terms' => [
    ['identifier' => 6, 'name' => '2010 - 2013'],
  ],
  'link_without_term' => 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?'.strip_term($_GET),
];



//smarty
$smarty->assign('header',$header);
$smarty->assign('text',$text);
$smarty->assign('title',"about");

$smarty->assign('html',$html);


$smarty->display('about.tpl');

?>
