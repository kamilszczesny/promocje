<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 19:21:30
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\modules\sgSearchJs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14304f11c7aa1ab498-10833510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9498ec9ee9a22036531a2e7b8e353787e2913198' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\modules\\sgSearchJs.tpl',
      1 => 1323635263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14304f11c7aa1ab498-10833510',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fieldId' => 0,
    'buttonId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11c7aa1dae6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11c7aa1dae6')) {function content_4f11c7aa1dae6($_smarty_tpl) {?>
    <script>
             $(document).ready(function(){
                 $('<?php echo $_smarty_tpl->tpl_vars['fieldId']->value;?>
').select_autocomplete();
                 $('<?php echo $_smarty_tpl->tpl_vars['buttonId']->value;?>
').click(function(){
                 });
                 
            });
    </script>
<?php }} ?>