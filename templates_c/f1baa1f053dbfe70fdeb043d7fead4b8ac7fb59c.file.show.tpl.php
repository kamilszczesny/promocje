<?php /* Smarty version Smarty-3.0.7, created on 2011-11-22 13:38:03
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/photo/show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23384ecb97ab320b60-21789933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1baa1f053dbfe70fdeb043d7fead4b8ac7fb59c' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/photo/show.tpl',
      1 => 1321965478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23384ecb97ab320b60-21789933',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <div class="imageSelector">
        <span class="imgName"><?php echo $_smarty_tpl->getVariable('item')->value->name;?>
</span>
        <img src="<?php echo $_smarty_tpl->getVariable('_view')->value->baseUrl();?>
/<?php echo $_smarty_tpl->getVariable('item')->value->imageUrl;?>
" alt="<?php echo $_smarty_tpl->getVariable('item')->value->name;?>
"/>
    </div>
<?php }} ?>

<script>

    $(document).ready(function(){
        $('.imageSelector').bind('click',function(event){
            img = $(this);
            $('.imageSelector').removeClass('selectedPhoto');
            img.addClass('selectedPhoto');
            url = img.find('img').attr('src');
            window.parent.finishUpload(url);
        });
    });

</script>
