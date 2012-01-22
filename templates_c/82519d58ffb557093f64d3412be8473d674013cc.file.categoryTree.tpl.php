<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 22:34:20
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\modules\categoryTree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156224f11c7aa1fc470-75046685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82519d58ffb557093f64d3412be8473d674013cc' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\modules\\categoryTree.tpl',
      1 => 1326576854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156224f11c7aa1fc470-75046685',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11c7aa28699',
  'variables' => 
  array (
    'categories' => 0,
    'item' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11c7aa28699')) {function content_4f11c7aa28699($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><div class="sideList">
    <div class="sideTitle">Kategorie:</div>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
            <a href="<?php echo smarty_function_zurl(array('controller'=>'category','action'=>'index','id'=>$_smarty_tpl->tpl_vars['item']->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
" class="category child <?php if (!empty($_smarty_tpl->tpl_vars['data']->value[0]->id)&&$_smarty_tpl->tpl_vars['item']->value->id==$_smarty_tpl->tpl_vars['data']->value[0]->id){?>selected<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['last']){?> last<?php }?>">
                <?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>

            </a>
        <?php } ?>
</div><?php }} ?>