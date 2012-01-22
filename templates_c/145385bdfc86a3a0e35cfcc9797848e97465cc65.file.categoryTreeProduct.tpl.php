<?php /* Smarty version Smarty-3.1.6, created on 2012-01-21 22:12:10
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\modules\categoryTreeProduct.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31094f11c6dad39bb5-04710011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '145385bdfc86a3a0e35cfcc9797848e97465cc65' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\modules\\categoryTreeProduct.tpl',
      1 => 1327180325,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31094f11c6dad39bb5-04710011',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11c6dae4442',
  'variables' => 
  array (
    'categories' => 0,
    'data' => 0,
    'currCat' => 0,
    'item' => 0,
    'key' => 0,
    'siblings' => 0,
    'i' => 0,
    'children' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11c6dae4442')) {function content_4f11c6dae4442($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><?php if (!empty($_smarty_tpl->tpl_vars['categories']->value)){?>
    <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable($_smarty_tpl->tpl_vars['categories']->value, null, 0);?>
<?php }?>
<div class="sideList">
    <div class="sideTitle">Kategorie:</div>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
                <?php if (empty($_smarty_tpl->tpl_vars['currCat']->value)||$_smarty_tpl->tpl_vars['currCat']->value->id!=$_smarty_tpl->tpl_vars['item']->value->id||count($_smarty_tpl->tpl_vars['data']->value)==1){?>
                <a href="<?php echo smarty_function_zurl(array('controller'=>'category','action'=>'index','id'=>$_smarty_tpl->tpl_vars['item']->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
" class="category child level<?php echo $_smarty_tpl->tpl_vars['item']->value->level;?>
 <?php if ($_smarty_tpl->tpl_vars['item']->value->id==$_smarty_tpl->tpl_vars['currCat']->value->id){?>selected<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['last']){?> last<?php }?>">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>

                </a>
                <?php }?>
                <?php if ((!$_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['last']&&!empty($_smarty_tpl->tpl_vars['currCat']->value)&&$_smarty_tpl->tpl_vars['currCat']->value->id==$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['key']->value+1]->id)){?>
                    <?php $_smarty_tpl->tpl_vars['siblings'] = new Smarty_variable($_smarty_tpl->tpl_vars['currCat']->value->getSiblings(), null, 0);?>
                    <?php if (!empty($_smarty_tpl->tpl_vars['siblings']->value)){?>
                        <?php $_smarty_tpl->tpl_vars['doneSiblings'] = new Smarty_variable(1, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['siblings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['i']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['i']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
 $_smarty_tpl->tpl_vars['i']->iteration++;
 $_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['c']['last'] = $_smarty_tpl->tpl_vars['i']->last;
?>
                            <a href="<?php echo smarty_function_zurl(array('controller'=>'category','action'=>'index','id'=>$_smarty_tpl->tpl_vars['i']->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['i']->value->name;?>
" class="category child <?php if ($_smarty_tpl->tpl_vars['i']->value->id==$_smarty_tpl->tpl_vars['currCat']->value->id){?>selected<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['c']['last']){?> last<?php }?>">
                                <?php echo $_smarty_tpl->tpl_vars['i']->value->name;?>

                            </a>
                        <?php } ?>
                    <?php }?>
                <?php }?>
            <?php } ?>
</div>
<?php $_smarty_tpl->tpl_vars['children'] = new Smarty_variable($_smarty_tpl->tpl_vars['currCat']->value->getChildren(), null, 0);?>
<?php if (!empty($_smarty_tpl->tpl_vars['children']->value)){?>
    <div class="sideList">
    <div class="sideTitle">Podkategorie:</div>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['children']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
" class="category child <?php if (0==1){?>selected<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['last']){?> last<?php }?>">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>

                </a>
            <?php } ?>
    </div>
<?php }?><?php }} ?>