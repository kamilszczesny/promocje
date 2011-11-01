<?php /* Smarty version Smarty-3.0.7, created on 2011-08-03 20:34:02
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\test2\application/views/scripts/error/error.phtml" */ ?>
<?php /*%%SmartyHeaderCode:259334e39949ad15af6-01750902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e8bc775c84ae5e65baf300d57c059225ec38bc1' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\test2\\application/views/scripts/error/error.phtml',
      1 => 1312396437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '259334e39949ad15af6-01750902',
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
