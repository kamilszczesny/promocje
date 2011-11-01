<?php /* Smarty version Smarty-3.0.7, created on 2011-06-05 12:01:56
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\test2\application/views/scripts/customer/get.phtml" */ ?>
<?php /*%%SmartyHeaderCode:166994deb5414ba07b5-36678076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0160634b79b9ab6283e9593655270af9c382c4b5' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\test2\\application/views/scripts/customer/get.phtml',
      1 => 1307268020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166994deb5414ba07b5-36678076',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
Customer get :)</br>
</br>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('customers')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
	</br>
	</br>
	============================================</br>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
         <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</br>
	<?php }} ?>
	</br>
<?php }} ?>
<?php echo $_smarty_tpl->getVariable('title')->value;?>
</br>
testowanie