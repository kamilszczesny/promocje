<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 19:18:13
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\error\error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44534f11c6e50477a8-33035534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fca63acd6367d05aef5b13a0a755b36ad996c7f' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\error\\error.tpl',
      1 => 1312396437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44534f11c6e50477a8-33035534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'exception' => 0,
    '_view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11c6e509e7a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11c6e509e7a')) {function content_4f11c6e509e7a($_smarty_tpl) {?><h1>An error occurred</h1>
<h2><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h2>
 
<h3>Exception information:</h3>
<p>
    <b>Message:</b> <?php echo $_smarty_tpl->tpl_vars['exception']->value->getMessage();?>

</p>
 
<h3>Stack trace:</h3>
<pre><?php echo $_smarty_tpl->tpl_vars['exception']->value->getTraceAsString();?>

</pre>
 
<h3>Request Parameters:</h3>
<pre><?php echo var_export($_smarty_tpl->tpl_vars['_view']->value->request->getParams(),true);?>

</pre>
<?php }} ?>