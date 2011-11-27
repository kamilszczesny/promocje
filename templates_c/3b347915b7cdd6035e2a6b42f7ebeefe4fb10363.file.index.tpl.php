<?php /* Smarty version Smarty-3.0.7, created on 2011-11-25 15:35:24
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/product/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293464ecfa7ac1e7b66-32627714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b347915b7cdd6035e2a6b42f7ebeefe4fb10363' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/product/index.tpl',
      1 => 1322222998,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293464ecfa7ac1e7b66-32627714',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_zurl')) include 'C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\library\Smarty\plugins\function.zurl.php';
?><div class="three phone-two columns">
    <?php $_template = new Smarty_Internal_Template((@APPLICATION_PATH).('\views\scripts\modules\categoryTreeProduct.tpl'), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('data',$_smarty_tpl->getVariable('data')->value->productagregat->category); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</div>
<div class="nine columns phone-four">
    <?php if (!empty($_smarty_tpl->getVariable('data',null,true,false)->value)){?>
    <?php ob_start(); ?><?php echo $_smarty_tpl->getVariable('data')->value->imageUrl;?>
<?php  $_smarty_tpl->assign('imageUrl', ob_get_contents()); Smarty::$_smarty_vars['capture']['default']=ob_get_clean();?>
<?php if (empty($_smarty_tpl->getVariable('imageUrl',null,true,false)->value)){?><?php ob_start(); ?><?php echo $_smarty_tpl->getVariable('data')->value->productagregat->imageUrl;?>
<?php  $_smarty_tpl->assign('imageUrl', ob_get_contents()); Smarty::$_smarty_vars['capture']['default']=ob_get_clean();?><?php }?>

<?php if (!empty($_smarty_tpl->getVariable('imageUrl',null,true,false)->value)){?>
    <div class="productImage">
        <img src="<?php echo $_smarty_tpl->getVariable('imageUrl')->value;?>
" alt="<?php echo $_smarty_tpl->getVariable('data')->value->name;?>
"/>
    </div>
<?php }?>
<h1 class="name"><?php echo $_smarty_tpl->getVariable('data')->value->name;?>
</h1>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value->productagregat->products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <span class="sizeChangeButton">
        <a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->getVariable('item')->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->getVariable('data')->value->name;?>
 <?php echo $_smarty_tpl->getVariable('item')->value->getSizeString();?>
">
            <?php echo $_smarty_tpl->getVariable('item')->value->getSizeString();?>
        
        </a>
    </span>
<?php }} ?>
<p class="description"><?php echo $_smarty_tpl->getVariable('data')->value->description;?>
</p>
<?php ob_start(); ?><?php echo $_smarty_tpl->getVariable('data')->value->productagregat->ingredients;?>
<?php  $_smarty_tpl->assign('ingredients', ob_get_contents()); Smarty::$_smarty_vars['capture']['default']=ob_get_clean();?>
<?php if (!empty($_smarty_tpl->getVariable('ingredients',null,true,false)->value)){?>
    <h2 class="subtitle">Skład: </h2>
    <p class="ingredients"><?php echo $_smarty_tpl->getVariable('ingredients')->value;?>
</p>
<?php }?>

<div class="promotionsList">
    <div id="accordion">
        <h3>Aktualne promocje</h3>
        <div>
            <table>
                <?php $_smarty_tpl->tpl_vars['promotions'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value->getCurrentPromotions(), null, null);?>
                <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('promotions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['promotion']->key;
?>
                    <tr>
                        <td><a href="<?php echo smarty_function_zurl(array('controller'=>'shop','action'=>'index','id'=>$_smarty_tpl->getVariable('promotion')->value->offer->shop->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->getVariable('promotion')->value->offer->shop->name;?>
"><img src="<?php echo $_smarty_tpl->getVariable('promotion')->value->offer->shop->imageUrl;?>
" alt="<?php echo $_smarty_tpl->getVariable('promotion')->value->offer->shop->name;?>
" class="shopLogo"/></a></td>
                        <td><?php echo $_smarty_tpl->getVariable('promotion')->value->getDateFrom();?>
 - <?php echo $_smarty_tpl->getVariable('promotion')->value->getDateTo();?>
</td>
                        <td><span class="promotionPrice"><?php echo $_smarty_tpl->getVariable('promotion')->value->getPriceString();?>
</span></td>
                        <td><?php echo $_smarty_tpl->getVariable('promotion')->value->promotionComment;?>
</td>
                    </tr>
                <?php }} ?>
            </table>
        </div>
        <h3>Przyszłe promocje</h3>
        <div>
            <table>
                <?php $_smarty_tpl->tpl_vars['promotions'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value->getFuturePromotions(), null, null);?>
                <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('promotions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['promotion']->key;
?>
                    <tr>
                        <td><a href="<?php echo smarty_function_zurl(array('controller'=>'shop','action'=>'index','id'=>$_smarty_tpl->getVariable('promotion')->value->offer->shop->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->getVariable('promotion')->value->offer->shop->name;?>
"><img src="<?php echo $_smarty_tpl->getVariable('promotion')->value->offer->shop->imageUrl;?>
" alt="<?php echo $_smarty_tpl->getVariable('promotion')->value->offer->shop->name;?>
" class="shopLogo"/></a></td>
                        <td><?php echo $_smarty_tpl->getVariable('promotion')->value->getDateFrom();?>
 - <?php echo $_smarty_tpl->getVariable('promotion')->value->getDateTo();?>
</td>
                        <td><span class="promotionPrice"><?php echo $_smarty_tpl->getVariable('promotion')->value->getPriceString();?>
</span></td>
                        <td><?php echo $_smarty_tpl->getVariable('promotion')->value->promotionComment;?>
</td>
                    </tr>
                <?php }} ?>
            </table>
        </div>
    </div>
</div>

<?php }?>

    <script>
            $(document).ready(function() {
                    jQuery( "#accordion" ).accordion();
            });
    </script>

</div>




