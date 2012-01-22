<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 19:58:15
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\offer\ajaxlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276684f11d04720e066-40962257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70885b5859b456e18bf273c405c35c9dc9afab97' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\offer\\ajaxlist.tpl',
      1 => 1322760001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276684f11d04720e066-40962257',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currentOffers' => 0,
    'futureOffers' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11d04726058',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11d04726058')) {function content_4f11d04726058($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ((@APPLICATION_PATH).('\views\scripts\modules\offersInShop.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('currentOffers'=>$_smarty_tpl->tpl_vars['currentOffers']->value,'futureOffers'=>$_smarty_tpl->tpl_vars['futureOffers']->value), 0);?>
<?php }} ?>