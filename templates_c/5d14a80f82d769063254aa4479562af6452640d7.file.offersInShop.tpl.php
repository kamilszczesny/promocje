<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 19:58:15
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application\views\scripts\modules\offersInShop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:233004f11d04726e965-26967669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d14a80f82d769063254aa4479562af6452640d7' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application\\views\\scripts\\modules\\offersInShop.tpl',
      1 => 1322766974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233004f11d04726e965-26967669',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currentOffers' => 0,
    'offer' => 0,
    'promotion' => 0,
    'productImage' => 0,
    'futureOffers' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11d04748faf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11d04748faf')) {function content_4f11d04748faf($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><?php if (!empty($_smarty_tpl->tpl_vars['currentOffers']->value)){?>
    <h2 class="clear">Aktualne promocje</h2>
    <?php  $_smarty_tpl->tpl_vars['offer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['offer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currentOffers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['offer']->key => $_smarty_tpl->tpl_vars['offer']->value){
$_smarty_tpl->tpl_vars['offer']->_loop = true;
?>
        <div class="offerItem">
            <h3 class="offerDates"><?php echo $_smarty_tpl->tpl_vars['offer']->value->getDateFrom();?>
 - <?php echo $_smarty_tpl->tpl_vars['offer']->value->getDateTo();?>
</h3>

            <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['offer']->value->promotions; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
$_smarty_tpl->tpl_vars['promotion']->_loop = true;
?>
                <div class="promotionItemInOffer">
                    <?php $_smarty_tpl->tpl_vars['productImage'] = new Smarty_variable($_smarty_tpl->tpl_vars['promotion']->value->product->imageUrl, null, 0);?>
                    <?php if (!empty($_smarty_tpl->tpl_vars['productImage']->value)){?>
                        <div class="productImage">
                            <a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['promotion']->value->product->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->product->name;?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['productImage']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->product->name;?>
"/>
                            </a>
                        </div>
                    <?php }?>
                    <div class="promotionInfo">
                        <a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['promotion']->value->product->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->product->name;?>
">
                        <span class="promotionName"><?php echo $_smarty_tpl->tpl_vars['promotion']->value->product->name;?>
</span>
                        <span class="promotionPrice"><?php echo $_smarty_tpl->tpl_vars['promotion']->value->getPriceString();?>
 PLN</span>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['futureOffers']->value)){?>
    <h2 class="clear">Przyszłe promocje</h2>
    <?php  $_smarty_tpl->tpl_vars['offer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['offer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['futureOffers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['offer']->key => $_smarty_tpl->tpl_vars['offer']->value){
$_smarty_tpl->tpl_vars['offer']->_loop = true;
?>
        <h3 class="offerDates"><?php echo $_smarty_tpl->tpl_vars['offer']->value->getDateFrom();?>
 - <?php echo $_smarty_tpl->tpl_vars['offer']->value->getDateTo();?>
</h3>
        <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['offer']->value->promotions; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
$_smarty_tpl->tpl_vars['promotion']->_loop = true;
?>
            <div class="promotionItemInOffer">
                <?php $_smarty_tpl->tpl_vars['productImage'] = new Smarty_variable($_smarty_tpl->tpl_vars['promotion']->value->product->imageUrl, null, 0);?>
                <?php if (!empty($_smarty_tpl->tpl_vars['productImage']->value)){?>
                    <div class="productImage">
                        <a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['promotion']->value->product->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->product->name;?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['productImage']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->product->name;?>
"/>
                        </a>
                    </div>
                <?php }?>
                <div class="promotionInfo">
                    <a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['promotion']->value->product->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->product->name;?>
">
                    <span class="promotionName"><?php echo $_smarty_tpl->tpl_vars['promotion']->value->product->name;?>
</span>
                    <span class="promotionPrice"><?php echo $_smarty_tpl->tpl_vars['promotion']->value->getPriceString();?>
 PLN</span>
                    </a>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
<?php }?>
<?php }} ?>