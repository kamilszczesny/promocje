<?php /* Smarty version Smarty-3.0.7, created on 2011-11-23 18:59:18
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/category/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72604ecd3476926dd5-61981889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d079c0e1f85b8412fcbe6b9319fe1754277f758' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/category/index.tpl',
      1 => 1322071130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72604ecd3476926dd5-61981889',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_zurl')) include 'C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\library\Smarty\plugins\function.zurl.php';
?><h1><?php echo $_smarty_tpl->getVariable('data')->value->name;?>
</h1>
<?php  $_smarty_tpl->tpl_vars['productagregat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value->productagregats; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['productagregat']->key => $_smarty_tpl->tpl_vars['productagregat']->value){
?>
    <div class="productAgregat">
        <a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->getVariable('productagregat')->value->products[0]->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->getVariable('productagregat')->value->name;?>
">
            <?php echo $_smarty_tpl->getVariable('productagregat')->value->name;?>
        
        </a>
        <div class="productAgregatInsideWrapper">
            <?php $_smarty_tpl->tpl_vars['imageUrl'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value->imageUrl, null, null);?>
            <?php if (empty($_smarty_tpl->getVariable('imageUrl',null,true,false)->value)){?>
            <?php $_smarty_tpl->tpl_vars['imageUrl'] = new Smarty_variable($_smarty_tpl->getVariable('productagregat')->value->imageUrl, null, null);?>
            <?php }?>
            <?php if (!empty($_smarty_tpl->getVariable('imageUrl',null,true,false)->value)){?>
                <div class="productImage">
                    <img src="<?php echo $_smarty_tpl->getVariable('imageUrl')->value;?>
" alt="<?php echo $_smarty_tpl->getVariable('data')->value->name;?>
"/>
                </div>
            <?php }?>
            <ul class="productSizesList">
                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('productagregat')->value->products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
                    <span class="productSizeButton">
                        <a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->getVariable('product')->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->getVariable('productagregat')->value->name;?>
">
                            <?php echo $_smarty_tpl->getVariable('product')->value->getSizeString();?>

                        </a>
                        <?php $_smarty_tpl->tpl_vars['smallestPrice'] = new Smarty_variable($_smarty_tpl->getVariable('product')->value->getSmallestCurrentPrice(), null, null);?>
                        <?php if (!empty($_smarty_tpl->getVariable('smallestPrice',null,true,false)->value)){?>
                            <span class="minimalPrice"> od <?php echo $_smarty_tpl->getVariable('product')->value->getSmallestCurrentPrice();?>
 PLN</span>
                        <?php }?>
                    </span>
                <?php }} ?>
            </ul>
        </div>
    </div>

<?php }} ?>
<?php $_template = new Smarty_Internal_Template("components/test.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>