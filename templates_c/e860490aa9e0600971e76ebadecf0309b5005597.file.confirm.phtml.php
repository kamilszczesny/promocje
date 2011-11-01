<?php /* Smarty version Smarty-3.0.7, created on 2011-08-22 20:38:36
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\test2\application/views/scripts/rezerwacje/confirm.phtml" */ ?>
<?php /*%%SmartyHeaderCode:15334e52a22cb85e52-07094519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e860490aa9e0600971e76ebadecf0309b5005597' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\test2\\application/views/scripts/rezerwacje/confirm.phtml',
      1 => 1314038264,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15334e52a22cb85e52-07094519',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!empty($_smarty_tpl->getVariable('message',null,true,false)->value)){?>
	<?php echo $_smarty_tpl->getVariable('message')->value;?>

<?php }?>
<?php if (!empty($_smarty_tpl->getVariable('reservation',null,true,false)->value)){?>
</br>
<?php echo var_dump($_smarty_tpl->getVariable('reservation')->value);?>

</br>
<?php }?>