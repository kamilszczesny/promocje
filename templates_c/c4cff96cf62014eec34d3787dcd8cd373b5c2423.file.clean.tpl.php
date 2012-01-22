<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 21:20:09
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\clean.tpl" */ ?>
<?php /*%%SmartyHeaderCode:228414f11e3799daf35-13277791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4cff96cf62014eec34d3787dcd8cd373b5c2423' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\clean.tpl',
      1 => 1321734095,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '228414f11e3799daf35-13277791',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11e379acfe0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11e379acfe0')) {function content_4f11e379acfe0($_smarty_tpl) {?><!DOCTYPE html>
<html lang="pl" xml:lang="pl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>My Weblog</title>
  <link rel="alternate" type="application/atom+xml"
                        title="My Weblog feed"
                        href="/feed/" />
  <link rel="search" type="application/opensearchdescription+xml"
                        title="My Weblog search"
                        href="opensearch.xml"  />
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/css/anytime.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/css/jquery-ui-1.8.16.custom.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/css/local.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/css/backend.css" type="text/css" />

  <script src="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/js/jquery-1.6.2.min.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/js/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/js/jquery.autocomplete.pack.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/js/jquery.select-autocomplete.js" type="text/javascript"></script>
  
</head>
   <body>
<?php echo $_smarty_tpl->tpl_vars['_view']->value->layout()->content;?>

</body>
</html><?php }} ?>