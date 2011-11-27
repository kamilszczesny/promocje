<?php /* Smarty version Smarty-3.0.7, created on 2011-11-20 15:43:08
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/backend.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197174ec911fc102e63-72573615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffca1d9d760b396a112ae1e4fcd84e5376a75eab' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/backend.tpl',
      1 => 1321800185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197174ec911fc102e63-72573615',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="pl" xml:lang="pl">
    <head>



<?php echo $_smarty_tpl->getVariable('_view')->value->headMeta();?>

<?php echo $_smarty_tpl->getVariable('_view')->value->headLink();?>

<?php echo $_smarty_tpl->getVariable('_view')->value->jQuery()->enable()->uiEnable();?>
     
<?php echo $_smarty_tpl->getVariable('_view')->value->headScript();?>
 
<?php echo $_smarty_tpl->getVariable('_view')->value->headTitle();?>
 
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