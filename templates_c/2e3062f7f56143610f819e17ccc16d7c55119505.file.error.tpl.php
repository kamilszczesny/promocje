<?php /* Smarty version Smarty-3.0.7, created on 2011-11-01 19:11:36
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/error/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:255664eb0365836a538-00118162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e3062f7f56143610f819e17ccc16d7c55119505' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/error/error.tpl',
      1 => 1312396437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255664eb0365836a538-00118162',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>An error occurred</h1>
<h2><?php echo $_smarty_tpl->getVariable('message')->value;?>
</h2>
 
<h3>Exception information:</h3>
<p>
    <b>Message:</b> <?php echo $_smarty_tpl->getVariable('exception')->value->getMessage();?>

</p>
 
<h3>Stack trace:</h3>
<pre><?php echo $_smarty_tpl->getVariable('exception')->value->getTraceAsString();?>

</pre>
 
<h3>Request Parameters:</h3>
<pre><?php echo var_export($_smarty_tpl->getVariable('_view')->value->request->getParams(),true);?>

</pre>
