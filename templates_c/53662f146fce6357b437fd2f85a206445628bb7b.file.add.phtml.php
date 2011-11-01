<?php /* Smarty version Smarty-3.0.7, created on 2011-08-01 19:10:22
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\test2\application/views/scripts/restaurant/add.phtml" */ ?>
<?php /*%%SmartyHeaderCode:282064e36ddfe56a1f8-02772436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53662f146fce6357b437fd2f85a206445628bb7b' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\test2\\application/views/scripts/restaurant/add.phtml',
      1 => 1312038624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '282064e36ddfe56a1f8-02772436',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!empty($_smarty_tpl->getVariable('success',null,true,false)->value)){?>
	<?php echo $_smarty_tpl->getVariable('success')->value;?>

<?php }else{ ?>
	<?php echo $_smarty_tpl->getVariable('form')->value;?>

<?php }?>
<br/>
<?php if (!empty($_smarty_tpl->getVariable('errorMessage',null,true,false)->value)){?><?php echo $_smarty_tpl->getVariable('errorMessage')->value;?>
<?php }?>
</br>
