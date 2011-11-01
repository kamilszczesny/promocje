<?php /* Smarty version Smarty-3.0.7, created on 2011-07-30 17:26:39
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\test2\application/views/scripts/owner/add.phtml" */ ?>
<?php /*%%SmartyHeaderCode:245044e3422afab84f9-03937352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fc96a7d9e4b759dc2678b183bfa15ead2db40d4' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\test2\\application/views/scripts/owner/add.phtml',
      1 => 1312038624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245044e3422afab84f9-03937352',
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
