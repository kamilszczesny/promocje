<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 19:50:51
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application\views\scripts\modules\categoryTreeShop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:278504f11ce8b741c14-54824212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fc076d05046b59a292a666edf30621455e710e5' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application\\views\\scripts\\modules\\categoryTreeShop.tpl',
      1 => 1326545103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '278504f11ce8b741c14-54824212',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'categoryName' => 0,
    'categories' => 0,
    'item' => 0,
    'dataId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11ce8b84501',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11ce8b84501')) {function content_4f11ce8b84501($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><div class="sideList">
    <div class="sideTitle">Kategorie:</div>
    <?php if (is_object($_smarty_tpl->tpl_vars['data']->value)){?>
        <?php $_smarty_tpl->tpl_vars['dataId'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value->id, null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['dataId'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[0]->id, null, 0);?>
    <?php }?>
    <?php $_smarty_tpl->tpl_vars['categoryName'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value->name, null, 0);?>
    <?php if (!empty($_smarty_tpl->tpl_vars['categoryName']->value)){?>
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
            <a href="<?php echo smarty_function_zurl(array('controller'=>'shopcategory','action'=>'index','id'=>$_smarty_tpl->tpl_vars['item']->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
" class="category <?php if ($_smarty_tpl->tpl_vars['item']->value->id==$_smarty_tpl->tpl_vars['dataId']->value){?>selected<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['last']){?> last<?php }?>">
                <?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>

            </a>
        <?php } ?>
    <?php }?>
</div><?php }} ?>