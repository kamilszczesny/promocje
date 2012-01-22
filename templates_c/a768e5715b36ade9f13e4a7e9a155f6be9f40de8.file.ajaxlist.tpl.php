<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 20:55:31
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\promotion\ajaxlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48404f11ddb38695f4-43837857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a768e5715b36ade9f13e4a7e9a155f6be9f40de8' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\promotion\\ajaxlist.tpl',
      1 => 1322777616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48404f11ddb38695f4-43837857',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currentPromotions' => 0,
    'futurePromotions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11ddb389f6b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11ddb389f6b')) {function content_4f11ddb389f6b($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ((@APPLICATION_PATH).('\views\scripts\modules\promotionsInProduct.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('currentPromotions'=>$_smarty_tpl->tpl_vars['currentPromotions']->value,'futurePromotions'=>$_smarty_tpl->tpl_vars['futurePromotions']->value), 0);?>
<?php }} ?>