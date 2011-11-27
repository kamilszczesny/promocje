<?php /* Smarty version Smarty-3.0.7, created on 2011-11-19 18:28:28
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/photo/upload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47434ec7e73ca1f2b6-84851137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2cf678fc2a149e9640dc3501aed4929eb1fa56d' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/photo/upload.tpl',
      1 => 1321723640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47434ec7e73ca1f2b6-84851137',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_zurl')) include 'C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\library\Smarty\plugins\function.zurl.php';
?><?php if (!empty($_smarty_tpl->getVariable('thumbImage',null,true,false)->value)){?>
    <script type="text/javascript">
    window.parent.finishUpload("<?php echo smarty_function_zurl(array('controller'=>'index','action'=>'index'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->getVariable('thumbImage')->value;?>
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
