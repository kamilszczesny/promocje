<?php /* Smarty version Smarty-3.0.7, created on 2011-08-01 20:56:29
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\test2\application/views/scripts/cuisinetype/add.phtml" */ ?>
<?php /*%%SmartyHeaderCode:106044e36f6dd0837d1-09783763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cff760fa525d97b493671f9ea18db3014579aa63' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\test2\\application/views/scripts/cuisinetype/add.phtml',
      1 => 1312038624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106044e36f6dd0837d1-09783763',
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
