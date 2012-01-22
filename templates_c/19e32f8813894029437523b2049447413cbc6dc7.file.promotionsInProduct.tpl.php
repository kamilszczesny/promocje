<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 20:55:31
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application\views\scripts\modules\promotionsInProduct.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198384f11ddb38ae5d0-04693726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19e32f8813894029437523b2049447413cbc6dc7' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application\\views\\scripts\\modules\\promotionsInProduct.tpl',
      1 => 1322817853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198384f11ddb38ae5d0-04693726',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currentPromotions' => 0,
    'futurePromotions' => 0,
    'promotion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11ddb3ad747',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11ddb3ad747')) {function content_4f11ddb3ad747($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><?php if (!empty($_smarty_tpl->tpl_vars['currentPromotions']->value)||!empty($_smarty_tpl->tpl_vars['futurePromotions']->value)){?>
    <div id="accordion">
    <?php if (!empty($_smarty_tpl->tpl_vars['currentPromotions']->value)){?>
        <h3>Aktualne promocje</h3>
        <div>
            <table>
                <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['currentPromotions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
$_smarty_tpl->tpl_vars['promotion']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['promotion']->key;
?>
                    <tr>
                        <td><a href="<?php echo smarty_function_zurl(array('controller'=>'shop','action'=>'index','id'=>$_smarty_tpl->tpl_vars['promotion']->value->offer->shop->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->offer->shop->name;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->offer->shop->imageUrl;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->offer->shop->name;?>
" class="shopLogo"/></a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['promotion']->value->getDateFrom();?>
 - <?php echo $_smarty_tpl->tpl_vars['promotion']->value->getDateTo();?>
</td>
                        <td><span class="promotionPrice"><?php echo $_smarty_tpl->tpl_vars['promotion']->value->getPriceString();?>
</span></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['promotion']->value->promotionComment;?>
</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['futurePromotions']->value)){?>
        <h3>Przyszłe promocje</h3>
        <div>
            <table>
                <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['futurePromotions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
$_smarty_tpl->tpl_vars['promotion']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['promotion']->key;
?>
                    <tr>
                        <td><a href="<?php echo smarty_function_zurl(array('controller'=>'shop','action'=>'index','id'=>$_smarty_tpl->tpl_vars['promotion']->value->offer->shop->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->offer->shop->name;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->offer->shop->imageUrl;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->offer->shop->name;?>
" class="shopLogo"/></a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['promotion']->value->getDateFrom();?>
 - <?php echo $_smarty_tpl->tpl_vars['promotion']->value->getDateTo();?>
</td>
                        <td><span class="promotionPrice"><?php echo $_smarty_tpl->tpl_vars['promotion']->value->getPriceString();?>
</span></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['promotion']->value->promotionComment;?>
</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php }?>
    </div>
<?php }?><?php }} ?>