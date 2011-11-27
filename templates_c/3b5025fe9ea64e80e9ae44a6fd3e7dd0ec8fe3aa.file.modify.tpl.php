<?php /* Smarty version Smarty-3.0.7, created on 2011-11-23 12:14:15
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/offer/modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:307344eccd58787d705-00824176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b5025fe9ea64e80e9ae44a6fd3e7dd0ec8fe3aa' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/offer/modify.tpl',
      1 => 1322046851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307344eccd58787d705-00824176',
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
		$( "#wyborDatyStart" ).datepicker({dateFormat: 'yy-mm-dd'});
                $( "#wyborDatyStop" ).datepicker({dateFormat: 'yy-mm-dd'});
                $('select#shop').select_autocomplete();
                //$('select#shop').show();
	});
</script>

