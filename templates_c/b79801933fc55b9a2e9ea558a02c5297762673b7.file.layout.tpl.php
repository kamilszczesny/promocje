<?php /* Smarty version Smarty-3.0.7, created on 2011-11-23 23:00:53
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139214ecd6d152b6203-09894619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b79801933fc55b9a2e9ea558a02c5297762673b7' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/layout.tpl',
      1 => 1322085648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139214ecd6d152b6203-09894619',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_zurl')) include 'C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\library\Smarty\plugins\function.zurl.php';
?><!DOCTYPE html>
<html lang="pl" xml:lang="pl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>My Weblog</title>

        <link rel="shortcut icon" href="/favicon.ico" />

        <?php echo $_smarty_tpl->getVariable('_view')->value->headMeta();?>

        <?php echo $_smarty_tpl->getVariable('_view')->value->headLink();?>
     
        <?php echo $_smarty_tpl->getVariable('_view')->value->headScript();?>
 
        <?php echo $_smarty_tpl->getVariable('_view')->value->headTitle();?>
 
    </head>
    <body>


        <div class="row display">
            <div class="twelwe phone-eight centered columns">
                <div class="row display">
                    <div class="twelwe phone-eight centered columns">
                        <header>
                            <nav>
                                <div class="navElement first active"><a href="<?php echo smarty_function_zurl(array('controller'=>'index','action'=>'index'),$_smarty_tpl);?>
" title="Start">Start</a></div>
                                <div class="navElement"><a href="<?php echo smarty_function_zurl(array('controller'=>'shop','action'=>'viewall'),$_smarty_tpl);?>
" title="Sklepy">Sklepy</a></div>
                                <div class="navElement"><a href="<?php echo smarty_function_zurl(array('controller'=>'offer','action'=>'viewactual'),$_smarty_tpl);?>
" title="aktualne gazetki">Aktualne gazetki</a></div>
                                <div class="navElement"><a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'viewall'),$_smarty_tpl);?>
" title="Produkty">Produkty</a></div>
                                <div class="navElement"><a href="<?php echo smarty_function_zurl(array('controller'=>'offer','action'=>'viewpopular'),$_smarty_tpl);?>
" title="Polecane oferty">Polecane oferty</a></div>
                            </nav>
                            <?php if (!empty($_smarty_tpl->getVariable('displaySgTop',null,true,false)->value)){?>

                            <?php }else{ ?>

                            <?php }?>
                        </header>
                    </div>
                </div>
                <div class="row display">
                    <div class="twelwe phone-eight centered columns">
                        <?php echo $_smarty_tpl->getVariable('_view')->value->layout()->content;?>

                    </div>
                </div>
            </div>
        </div>
        <footer>

        </footer>

    </body>
</html>