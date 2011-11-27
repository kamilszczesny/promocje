<?php /* Smarty version Smarty-3.0.7, created on 2011-11-25 15:32:36
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application\views\scripts\modules\categoryTreeShop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:313824ecfa704e26ec3-56589774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fc076d05046b59a292a666edf30621455e710e5' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application\\views\\scripts\\modules\\categoryTreeShop.tpl',
      1 => 1322231553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313824ecfa704e26ec3-56589774',
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
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
if ($_smarty_tpl->tpl_vars['item']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
            <a href="<?php echo smarty_function_zurl(array('controller'=>'shopcategory','action'=>'index','id'=>$_smarty_tpl->getVariable('item')->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->getVariable('item')->value->name;?>
" class="category <?php if ($_smarty_tpl->getVariable('item')->value->id==$_smarty_tpl->getVariable('data')->value->id){?>selected<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['last']){?> last<?php }?>">
                <?php echo $_smarty_tpl->getVariable('item')->value->name;?>

            </a>
        <?php }} ?>
    <?php }?>
</div>
<div class="sideList">
    <div class="sideTitle">Podobne sklepy:</div>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value->shops; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
if ($_smarty_tpl->tpl_vars['item']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['similar']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
        <?php if ($_smarty_tpl->getVariable('id')->value!=$_smarty_tpl->getVariable('item')->value->id){?>
        <a href="<?php echo smarty_function_zurl(array('controller'=>'shop','action'=>'index','id'=>$_smarty_tpl->getVariable('item')->value->id),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['similar']['last']){?>class="last"<?php }?>>

            <?php echo $_smarty_tpl->getVariable('item')->value->name;?>

        </a>
        <?php }?>
    <?php }} ?>
</div>