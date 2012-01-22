<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 21:49:06
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69204f11c6db186619-54924638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55a2da5bc5511289923282cec2fa64c383c65f85' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\layout.tpl',
      1 => 1326574142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69204f11c6db186619-54924638',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11c6db27374',
  'variables' => 
  array (
    '_view' => 0,
    'displaySgTop' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11c6db27374')) {function content_4f11c6db27374($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><!DOCTYPE html>
<html lang="pl" xml:lang="pl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php echo $_smarty_tpl->tpl_vars['_view']->value->headTitle();?>
 

        <link rel="shortcut icon" href="/favicon.ico" />

        <?php echo $_smarty_tpl->tpl_vars['_view']->value->headMeta();?>

        <?php echo $_smarty_tpl->tpl_vars['_view']->value->headLink();?>
     
        <?php echo $_smarty_tpl->tpl_vars['_view']->value->headScript();?>
 
    </head>
    <body>


        <div class="row display">
            <div class="twelwe phone-eight centered columns">
                <div class="row display">
                    <div class="twelwe phone-eight centered columns">
                        <header>
                            <div class="overMenu"><img src="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/images/napromocji.png" alt="NaPromocji.pl" id="logo"/></div>
                            <nav>
                                <div class="navElement first active"><a href="<?php echo smarty_function_zurl(array('controller'=>'index','action'=>'index'),$_smarty_tpl);?>
" title="Start">Start</a></div>
                            </nav>
                            <?php if (!empty($_smarty_tpl->tpl_vars['displaySgTop']->value)){?>

                            <?php }else{ ?>

                            <?php }?>
                        </header>
                    </div>
                </div>
                <div class="row display">
                    <div class="twelwe phone-eight centered columns">
                        <?php echo $_smarty_tpl->tpl_vars['_view']->value->layout()->content;?>

                    </div>
                </div>
            </div>
        </div>
        <footer>

        </footer>
        
    </body>
</html><?php }} ?>