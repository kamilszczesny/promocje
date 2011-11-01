<?php /* Smarty version Smarty-3.0.7, created on 2011-07-30 11:24:51
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\test2\application/views/scripts/customer/add.phtml" */ ?>
<?php /*%%SmartyHeaderCode:180674e33cde3b7fe98-06223318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bff3b35ad6c770addf294f275ea625c0bbb0201' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\test2\\application/views/scripts/customer/add.phtml',
      1 => 1312017872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180674e33cde3b7fe98-06223318',
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
=============================</br>
<?php echo $_smarty_tpl->getVariable('form2')->value;?>


<script type="text/javascript">AnyTime.picker( "data",{format: "%z-%c-%d %H:%i", firstDOW: 1 } );</script>
