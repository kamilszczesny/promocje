<?php /* Smarty version Smarty-3.1.6, created on 2012-01-21 21:11:53
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\category\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:280604f11c784660181-64168898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6146b626e44d8c0e68ec7459de5d642c58119977' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\category\\index.tpl',
      1 => 1327176646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280604f11c784660181-64168898',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11c78481e9f',
  'variables' => 
  array (
    'categories' => 0,
    'data' => 0,
    'key' => 0,
    'productagregat' => 0,
    'imageUrl' => 0,
    'product' => 0,
    'smallestPrice' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11c78481e9f')) {function content_4f11c78481e9f($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><?php if (empty($_smarty_tpl->tpl_vars['categories']->value)){?><?php $_smarty_tpl->tpl_vars['categories'] = new Smarty_variable(null, null, 0);?><?php }?>
<div class="three phone-two columns">
    <?php if ($_smarty_tpl->tpl_vars['data']->value->level==0){?>
        <?php echo $_smarty_tpl->getSubTemplate ('file:modules/categoryTreeProduct.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('currCat'=>$_smarty_tpl->tpl_vars['data']->value,'categories'=>$_smarty_tpl->tpl_vars['categories']->value), 0);?>

    <?php }else{ ?>
        <?php echo $_smarty_tpl->getSubTemplate ('file:modules/categoryTreeProduct.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('currCat'=>$_smarty_tpl->tpl_vars['data']->value,'data'=>$_smarty_tpl->tpl_vars['data']->value->getCategoryTree()), 0);?>

    <?php }?>
</div>
<div class="nine columns phone-four">
    <h1><?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
</h1>    
    <?php  $_smarty_tpl->tpl_vars['productagregat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['productagregat']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value->productagregats; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['productagregat']->key => $_smarty_tpl->tpl_vars['productagregat']->value){
$_smarty_tpl->tpl_vars['productagregat']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['productagregat']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['key']->value%2==0){?>
            <div class="row">
        <?php }?>
        <div class="productAgregat six columns">
            <a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['productagregat']->value->products[0]->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['productagregat']->value->name;?>
">
                <?php echo $_smarty_tpl->tpl_vars['productagregat']->value->name;?>
        
            </a>
            <div class="productAgregatInsideWrapper">
                    <?php $_smarty_tpl->tpl_vars['imageUrl'] = new Smarty_variable($_smarty_tpl->tpl_vars['productagregat']->value->imageUrl, null, 0);?>
                <?php if (!empty($_smarty_tpl->tpl_vars['imageUrl']->value)){?>
                    <div class="productImage">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['imageUrl']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
"/>
                    </div>
                <?php }?>
                <ul class="productSizesList">
                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productagregat']->value->products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                        <li>
                            <a class="small white nice button radius" href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['product']->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['productagregat']->value->name;?>
">
                            <?php echo $_smarty_tpl->tpl_vars['product']->value->getSizeString();?>

                            </a>
                            <?php $_smarty_tpl->tpl_vars['smallestPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getSmallestCurrentPrice(), null, 0);?>
                            <?php if (!empty($_smarty_tpl->tpl_vars['smallestPrice']->value)){?>
                                <span class="minimalPrice"> od <?php echo $_smarty_tpl->tpl_vars['product']->value->getSmallestCurrentPrice();?>
 PLN</span>
                            <?php }?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
                <?php if ($_smarty_tpl->tpl_vars['key']->value%2==1){?>
            </div>
        <?php }?>
    <?php } ?>
</div><?php }} ?>