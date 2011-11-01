<?php /* Smarty version Smarty-3.0.7, created on 2011-08-20 14:03:31
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\test2\application/views/scripts/rezerwacje/make.phtml" */ ?>
<?php /*%%SmartyHeaderCode:233034e4fa293cca064-77177804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eadb17c528fb8bbcb0cef82cb0986c9ffae0cdeb' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\test2\\application/views/scripts/rezerwacje/make.phtml',
      1 => 1313841788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233034e4fa293cca064-77177804',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!empty($_smarty_tpl->getVariable('message',null,true,false)->value)){?>
	<?php echo $_smarty_tpl->getVariable('message')->value;?>

<?php }?>
<?php echo $_smarty_tpl->getVariable('form')->value;?>
