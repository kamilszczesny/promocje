<?php /* Smarty version Smarty-3.0.7, created on 2011-10-02 16:56:23
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/customer/add.phtml" */ ?>
<?php /*%%SmartyHeaderCode:227214e887b972ac325-23188345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d7a4652a0cd5fd7ef3983cf299dbd65d179cda3' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/customer/add.phtml',
      1 => 1312017872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '227214e887b972ac325-23188345',
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
