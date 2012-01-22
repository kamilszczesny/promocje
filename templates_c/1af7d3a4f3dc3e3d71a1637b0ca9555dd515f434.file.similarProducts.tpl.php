<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 19:18:02
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\modules\similarProducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205924f11c6daf28ff4-04263829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1af7d3a4f3dc3e3d71a1637b0ca9555dd515f434' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\modules\\similarProducts.tpl',
      1 => 1322600825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205924f11c6daf28ff4-04263829',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'item' => 0,
    'imageUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11c6db073c2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11c6db073c2')) {function content_4f11c6db073c2($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?>
<div class="sideList products">
    <div class="sideTitle">Podobne produkty:</div>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value->productagregats; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['similar']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
        <a href="<?php echo smarty_function_zurl(array('controller'=>'productagregat','action'=>'index','id'=>$_smarty_tpl->tpl_vars['item']->value->id),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['similar']['last']){?>class="last"<?php }?>>
            <?php $_smarty_tpl->tpl_vars['imageUrl'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value->imageUrl, null, 0);?>
            <?php if (!empty($_smarty_tpl->tpl_vars['imageUrl']->value)){?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['imageUrl']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
" class="similarImg"/>
            <?php }?>
            <?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>

        </a>
    <?php } ?>
</div><?php }} ?>