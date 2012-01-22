<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 19:50:51
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application\views\scripts\modules\similarShops.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26524f11ce8b87ff03-70013580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '690c13368b80b8b2b7b82f9b9d9c3bddc3a8bb82' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application\\views\\scripts\\modules\\similarShops.tpl',
      1 => 1322566711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26524f11ce8b87ff03-70013580',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'id' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11ce8b93116',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11ce8b93116')) {function content_4f11ce8b93116($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><div class="sideList">
    <div class="sideTitle">Podobne sklepy:</div>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value->shops; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['similar']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
        <?php if ($_smarty_tpl->tpl_vars['id']->value!=$_smarty_tpl->tpl_vars['item']->value->id){?>
        <a href="<?php echo smarty_function_zurl(array('controller'=>'shop','action'=>'index','id'=>$_smarty_tpl->tpl_vars['item']->value->id),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['similar']['last']){?>class="last"<?php }?>>

            <?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>

        </a>
        <?php }?>
    <?php } ?>
</div><?php }} ?>