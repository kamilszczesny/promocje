<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 21:20:09
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\photo\show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108894f11e37994bce1-29175619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '154df54b9e17ad57829251bbdbfc570aa120fe08' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\photo\\show.tpl',
      1 => 1321965478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108894f11e37994bce1-29175619',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'item' => 0,
    '_view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11e3799c2fd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11e3799c2fd')) {function content_4f11e3799c2fd($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <div class="imageSelector">
        <span class="imgName"><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</span>
        <img src="<?php echo $_smarty_tpl->tpl_vars['_view']->value->baseUrl();?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value->imageUrl;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
"/>
    </div>
<?php } ?>

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
<?php }} ?>