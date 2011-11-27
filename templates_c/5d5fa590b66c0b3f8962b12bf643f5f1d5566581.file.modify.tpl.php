<?php /* Smarty version Smarty-3.0.7, created on 2011-11-23 14:58:39
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/promotion/modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301094eccfc0fa51e74-68749978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d5fa590b66c0b3f8962b12bf643f5f1d5566581' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/promotion/modify.tpl',
      1 => 1322056716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '301094eccfc0fa51e74-68749978',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo $_smarty_tpl->getVariable('message')->value;?>

<hr/>
<?php echo $_smarty_tpl->getVariable('form')->value;?>

<hr/>
<?php if (!empty($_smarty_tpl->getVariable('data',null,true,false)->value)){?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->index++;
 $_smarty_tpl->tpl_vars['item']->first = $_smarty_tpl->tpl_vars['item']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['cities']['first'] = $_smarty_tpl->tpl_vars['item']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['cities']['first']){?>, <?php }?><?php echo $_smarty_tpl->getVariable('item')->value->name;?>
<?php }} ?>
<?php }?>

<script>
	$(function() {
                $('select#offer').select_autocomplete();
                $('select#product').select_autocomplete();
	});
</script>
