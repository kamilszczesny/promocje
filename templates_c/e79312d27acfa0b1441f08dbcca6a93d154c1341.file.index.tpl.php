<?php /* Smarty version Smarty-3.1.6, created on 2012-01-21 22:44:56
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\productagregat\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139784f11d0148a4b78-41668373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e79312d27acfa0b1441f08dbcca6a93d154c1341' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\productagregat\\index.tpl',
      1 => 1327182292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139784f11d0148a4b78-41668373',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11d014ab2e2',
  'variables' => 
  array (
    'data' => 0,
    'cat1' => 0,
    'categories' => 0,
    'key' => 0,
    'product' => 0,
    'imageUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11d014ab2e2')) {function content_4f11d014ab2e2($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><div class="three phone-two columns">
    <?php $_smarty_tpl->tpl_vars['cat1'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value->getMainCategory(), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['categories'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value->getCategories(), null, 0);?>
    <?php if (!empty($_smarty_tpl->tpl_vars['cat1']->value)){?>
        <?php echo $_smarty_tpl->getSubTemplate ('file:modules/categoryTreeProduct.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('data'=>$_smarty_tpl->tpl_vars['categories']->value,'currCat'=>$_smarty_tpl->tpl_vars['cat1']->value), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('file:modules/similarProducts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('data'=>$_smarty_tpl->tpl_vars['cat1']->value), 0);?>

    <?php }?>
</div>
<div class="nine columns phone-four">
    <h1>Rodzaje i wielkości <?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
</h1>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value->products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['key']->value%4==0){?>
            <div class="row">
            <?php }?>
            <div class="three columns productBlurb">
            <?php $_smarty_tpl->_capture_stack[] = array('default', 'imageUrl', null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['product']->value->imageUrl;?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php if (empty($_smarty_tpl->tpl_vars['imageUrl']->value)){?><?php $_smarty_tpl->_capture_stack[] = array('default', 'imageUrl', null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['data']->value->imageUrl;?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['imageUrl']->value)){?>
                <div class="productImage">
                    <a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['product']->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['imageUrl']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
"/>
                    </a>
                </div>
            <?php }?>
            <h4><a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['product']->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</a></h4>
            </div>
<?php if ($_smarty_tpl->tpl_vars['key']->value%4==3){?>
</div>
<?php }?>
<?php } ?>
</div>





<?php }} ?>