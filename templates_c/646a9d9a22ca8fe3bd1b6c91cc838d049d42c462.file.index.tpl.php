<?php /* Smarty version Smarty-3.0.7, created on 2011-11-25 17:27:57
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/shop/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:231134ecfc20d0838d6-53954012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '646a9d9a22ca8fe3bd1b6c91cc838d049d42c462' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/shop/index.tpl',
      1 => 1322238416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '231134ecfc20d0838d6-53954012',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="three phone-two columns">
    <?php $_template = new Smarty_Internal_Template((@APPLICATION_PATH).('\views\scripts\modules\categoryTreeShop.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('data',$_smarty_tpl->getVariable('data')->value->category);$_template->assign('categories',$_smarty_tpl->getVariable('categories')->value);$_template->assign('id',$_smarty_tpl->getVariable('data')->value->id); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</div>
<div class="nine columns phone-four">
    <?php if (!empty($_smarty_tpl->getVariable('data',null,true,false)->value)){?>
        <?php $_smarty_tpl->tpl_vars['imageUrl'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value->imageUrl, null, null);?>
        <?php if (!empty($_smarty_tpl->getVariable('imageUrl',null,true,false)->value)){?>
            <div class="shopImage">
                <img src="<?php echo $_smarty_tpl->getVariable('data')->value->imageUrl;?>
" alt="<?php echo $_smarty_tpl->getVariable('data')->value->name;?>
" class="shopLogo"/>
            </div>
        <?php }?>
        <h1><?php echo $_smarty_tpl->getVariable('data')->value->name;?>
</h1>
        <p><?php echo $_smarty_tpl->getVariable('data')->value->description;?>
</p>
        <h2 class="clear">Najnowsze promocje</h2>
        <?php if (!$_smarty_tpl->getVariable('data')->value->offers->isEmpty()){?>
            <?php  $_smarty_tpl->tpl_vars['offer'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value->offers; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['offer']->key => $_smarty_tpl->tpl_vars['offer']->value){
?>
                <h3 class="offerDates"><?php echo $_smarty_tpl->getVariable('offer')->value->getDateFrom();?>
 - <?php echo $_smarty_tpl->getVariable('offer')->value->getDateTo();?>
</h3>
                <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('offer')->value->promotions; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
?>
                    <div class="promotionItemInOffer">
                        <?php $_smarty_tpl->tpl_vars['productImage'] = new Smarty_variable($_smarty_tpl->getVariable('promotion')->value->product->imageUrl, null, null);?>
                        <?php if (!empty($_smarty_tpl->getVariable('productImage',null,true,false)->value)){?>
                            <div class="productImage">
                                <img src="<?php echo $_smarty_tpl->getVariable('productImage')->value;?>
" alt="<?php echo $_smarty_tpl->getVariable('promotion')->value->product->name;?>
"/>
                            </div>
                        <?php }?>
                        <div class="promotionInfo">
                            <span class="promotionName"><?php echo $_smarty_tpl->getVariable('promotion')->value->product->name;?>
</span>
                            <span class="promotionPrice"><?php echo $_smarty_tpl->getVariable('promotion')->value->getPriceString();?>
 PLN</span>
                        </div>
                    </div>
                <?php }} ?>
            <?php }} ?>
        <?php }?>
    <?php }?>
</div>