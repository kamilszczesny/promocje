<?php /* Smarty version Smarty-3.0.7, created on 2011-10-02 17:49:13
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/error/error.phtml" */ ?>
<?php /*%%SmartyHeaderCode:104304e8887f9ba0920-13602707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e3c436623f7c5d1c5fd8db8b308a12d827ba7b5' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/error/error.phtml',
      1 => 1312396437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104304e8887f9ba0920-13602707',
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
