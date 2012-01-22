<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 21:20:09
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\photo\upload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:295074f11e3797dd893-81652484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9fe303073a64b788743bb7c2adb17bc2df2de42' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\photo\\upload.tpl',
      1 => 1321723640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295074f11e3797dd893-81652484',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'thumbImage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11e37983ce1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11e37983ce1')) {function content_4f11e37983ce1($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><?php if (!empty($_smarty_tpl->tpl_vars['thumbImage']->value)){?>
    <script type="text/javascript">
    window.parent.finishUpload("<?php echo smarty_function_zurl(array('controller'=>'index','action'=>'index'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['thumbImage']->value;?>
");
    </script>
    Zdjęcie dodane na serwer!<br/>
    link do niego został umieszczony w formularzu poniżej.
<?php }else{ ?>
    <form enctype="multipart/form-data" action="/promocje/public/photo/upload" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
        Wybierz zdjęcie produktu: <input name="uploadedfile" type="file" /><br/>
        Nazwa obrazka: <input name="name" type="text" />
        <input type="submit" value="Wrzuć na serwer" />
    </form>
<?php }?>
<?php }} ?>