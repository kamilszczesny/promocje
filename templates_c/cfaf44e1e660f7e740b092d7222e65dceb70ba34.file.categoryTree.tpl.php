<?php /* Smarty version Smarty-3.0.7, created on 2011-11-24 18:18:13
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application\views\scripts\modules\categoryTree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:274434ece7c5548b444-33347668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfaf44e1e660f7e740b092d7222e65dceb70ba34' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application\\views\\scripts\\modules\\categoryTree.tpl',
      1 => 1322155089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '274434ece7c5548b444-33347668',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_zurl')) include 'C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\library\Smarty\plugins\function.zurl.php';
?><div class="sideList">
    <div class="sideTitle">Kategorie:</div>
<?php $_smarty_tpl->tpl_vars['categoryName'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value->name, null, null);?>
<?php if (!empty($_smarty_tpl->getVariable('categoryName',null,true,false)->value)){?>
    <a href="<?php echo smarty_function_zurl(array('controller'=>'category','action'=>'index','id'=>$_smarty_tpl->getVariable('data')->value->parent->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->getVariable('data')->value->parent->name;?>
" class="category parent">
    <?php echo $_smarty_tpl->getVariable('data')->value->parent->name;?>

    </a>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value->parent->children; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
if ($_smarty_tpl->tpl_vars['item']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
        <a href="<?php echo smarty_function_zurl(array('controller'=>'category','action'=>'index','id'=>$_smarty_tpl->getVariable('item')->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->getVariable('item')->value->name;?>
" class="category child <?php if ($_smarty_tpl->getVariable('item')->value->id==$_smarty_tpl->getVariable('data')->value->id){?>selected<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['last']){?> last<?php }?>">
        <?php echo $_smarty_tpl->getVariable('item')->value->name;?>

        </a>
    <?php }} ?>
<?php }?>
</div>
<div class="sideList">
    <div class="sideTitle">Podobne produkty:</div>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value->productagregats; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
if ($_smarty_tpl->tpl_vars['item']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['similar']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
<a href="<?php echo smarty_function_zurl(array('controller'=>'productagregat','action'=>'view','id'=>$_smarty_tpl->getVariable('item')->value->id),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['similar']['last']){?>class="last"<?php }?>>
<?php $_smarty_tpl->tpl_vars['imageUrl'] = new Smarty_variable($_smarty_tpl->getVariable('item')->value->imageUrl, null, null);?>
<?php if (!empty($_smarty_tpl->getVariable('imageUrl',null,true,false)->value)){?>
<img src="<?php echo $_smarty_tpl->getVariable('imageUrl')->value;?>
" alt="<?php echo $_smarty_tpl->getVariable('item')->value->name;?>
" class="similarImg"/>
<?php }?>
<?php echo $_smarty_tpl->getVariable('item')->value->name;?>

</a>
    <?php }} ?>
</div>