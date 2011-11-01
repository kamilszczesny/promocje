<?php /* Smarty version Smarty-3.0.7, created on 2011-10-02 16:56:23
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/layout.phtml" */ ?>
<?php /*%%SmartyHeaderCode:290214e887b9749ff99-94914775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd57d4b6ccd8a0095058e047d7ff2078f5a5f994f' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/layout.phtml',
      1 => 1314731620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '290214e887b9749ff99-94914775',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
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
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('_view')->value->baseUrl();?>
/css/anytime.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('_view')->value->baseUrl();?>
/css/jquery-ui-1.8.16.custom.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('_view')->value->baseUrl();?>
/css/local.css" type="text/css" />

  <script src="<?php echo $_smarty_tpl->getVariable('_view')->value->baseUrl();?>
/js/jquery-1.6.2.min.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->getVariable('_view')->value->baseUrl();?>
/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->getVariable('_view')->value->baseUrl();?>
/js/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
  
</head>
   <body>
   	<div id="body">
   	<div class="bodywrap">
   		<header>
   			<nav>
   			</nav>
   			<?php if (!empty($_smarty_tpl->getVariable('displaySgTop',null,true,false)->value)){?>
   				<div class="sgTop">
   					<div class="searchForm"></div>
   					<img src="images/top1.jpg" alt="top"/>
   				</div>
   			<?php }else{ ?>
   				<div class="normalTop">
   				</div>	
   			<?php }?>
   		</header>
   		<div class="content">
   			<?php echo $_smarty_tpl->getVariable('_view')->value->layout()->content;?>

   		</div>
   		<footer>
   			
   		</footer>
   	</div>
   	</div>
   </body>
</html>