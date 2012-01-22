<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 22:35:03
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207094f11c7a9ed8715-76394414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52a4b222b21b4bc8edccee1dc67f10f53fd82fd1' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\index\\index.tpl',
      1 => 1326576900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207094f11c7a9ed8715-76394414',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11c7aa1705e',
  'variables' => 
  array (
    'categories' => 0,
    'productSearchForm' => 0,
    'shopSearchForm' => 0,
    'popularPromotions' => 0,
    'promotion' => 0,
    'key' => 0,
    'product' => 0,
    'imageUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11c7aa1705e')) {function content_4f11c7aa1705e($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><div class="row sgPage">
    <div class="three columns">
        <?php echo $_smarty_tpl->getSubTemplate ('file:modules/categoryTree.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('categories'=>$_smarty_tpl->tpl_vars['categories']->value), 0);?>

        <h2>Reklama</h2>
    </div>
    <div class="nine columns">
        <div class="row">
            <div class="six columns">
                <h2>Szukaj Produktu</h2>
                <?php echo $_smarty_tpl->tpl_vars['productSearchForm']->value;?>

                <span id="productsSearch" class="small black button radius">Wybierz produkt</span>
                <?php echo $_smarty_tpl->getSubTemplate ('file:modules/sgSearchJs.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('fieldId'=>'#products','buttonId'=>'#productsSearch'), 0);?>

            </div>
            <div class="six columns">
                <h2>Szukaj Sklepu</h2>
                <?php echo $_smarty_tpl->tpl_vars['shopSearchForm']->value;?>

                <span id="shopsSearch" class="small black button radius">Wybierz sklep</span>
                <?php echo $_smarty_tpl->getSubTemplate ('file:modules/sgSearchJs.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('fieldId'=>'#shops','buttonId'=>'#shopsSearch'), 0);?>

            </div>
        </div>
        <h2>Najciekawsze Oferty</h2>

        <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['popularPromotions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
$_smarty_tpl->tpl_vars['promotion']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['promotion']->key;
?>
            <?php $_smarty_tpl->tpl_vars['product'] = new Smarty_variable($_smarty_tpl->tpl_vars['promotion']->value->product, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['key']->value%4==0){?>
                <div class="row">
                <?php }?>
                <div class="three columns productBlurb">
                <?php $_smarty_tpl->_capture_stack[] = array('default', 'imageUrl', null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['product']->value->imageUrl;?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php if (empty($_smarty_tpl->tpl_vars['imageUrl']->value)){?><?php $_smarty_tpl->_capture_stack[] = array('default', 'imageUrl', null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['product']->value->imageUrl;?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['imageUrl']->value)){?>
            <div class="productImage">
                <a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['product']->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['imageUrl']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
"/>
                </a>
            </div>
        <?php }?>
        <h4><a href="<?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['product']->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</a></h4>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['key']->value%4==3){?>
    </div>
<?php }?>
<?php } ?>
</div>

</div>
    
        <script>
                goToShop = function(sid){
                    window.location.href = '<?php echo smarty_function_zurl(array('controller'=>'shop','action'=>'index'),$_smarty_tpl);?>
/index/id/'+sid;
                 }
                 goToProduct = function(pid){
                    window.location.href = '<?php echo smarty_function_zurl(array('controller'=>'productagregat','action'=>'index'),$_smarty_tpl);?>
/index/id/'+pid;
                 }
                 $(document).ready(function(){                 
                     $('#productsSearch').click(function(){
                        productId =  $('#productSearch :selected').val();
                        goToProduct(productId);
                     });
          $('#productSearch').keypress(function(e){
              if(e.keyCode == 13){
                  e.preventDefault();
                  productId =  $('#productSearch :selected').val();
                  goToProduct(productId);
               }
          });
          $('#shopsSearch').click(function(){
                shopId =  $('#shopSearch :selected').val();
                goToShop(shopId);
            });
                 
          });
          $('#shopSearch').keypress(function(e){
              if(e.keyCode == 13){
                  e.preventDefault();
                  shopId =  $('#shopSearch :selected').val();
                  goToShop(shopId);
               }
          });
        </script>
    <?php }} ?>