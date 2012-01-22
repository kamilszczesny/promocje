<?php /* Smarty version Smarty-3.1.6, created on 2012-01-21 17:36:21
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\product\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153294f11c6da8fd033-83650833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ef9c359315202c6d85a824db57f5c8b58847d3f' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\product\\index.tpl',
      1 => 1327163714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153294f11c6da8fd033-83650833',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11c6dacf700',
  'variables' => 
  array (
    'data' => 0,
    'cat1' => 0,
    'categories' => 0,
    'imageUrl' => 0,
    'product' => 0,
    'productagregat' => 0,
    'agregat' => 0,
    'ingredients' => 0,
    'form1' => 0,
    'promotions' => 0,
    'promotion' => 0,
    'form2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11c6dacf700')) {function content_4f11c6dacf700($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><div class="three phone-two columns">
    <?php $_smarty_tpl->tpl_vars['cat1'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value->getMainCategory(), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['categories'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value->getCategories(), null, 0);?>
    <?php if (!empty($_smarty_tpl->tpl_vars['cat1']->value)){?>
        <?php echo $_smarty_tpl->getSubTemplate ('file:modules/categoryTreeProduct.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('data'=>$_smarty_tpl->tpl_vars['categories']->value,'currCat'=>$_smarty_tpl->tpl_vars['cat1']->value), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('file:modules/similarProducts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('data'=>$_smarty_tpl->tpl_vars['cat1']->value), 0);?>

    <?php }?>
</div>
<div class="nine columns phone-four mainColumn">
    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?>
    <?php $_smarty_tpl->_capture_stack[] = array('default', 'imageUrl', null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['data']->value->imageUrl;?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if (empty($_smarty_tpl->tpl_vars['imageUrl']->value)){?><?php $_smarty_tpl->_capture_stack[] = array('default', 'imageUrl', null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['data']->value->productagregat->imageUrl;?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['imageUrl']->value)){?>
    <div class="productImage">
        <img src="<?php echo $_smarty_tpl->tpl_vars['imageUrl']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
"/>
    </div>
<?php }?>
<h1 class="name"><?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
</h1>
<p>
    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value->productagregat->products)){?>
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value->productagregat->products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>

            <a class="small <?php if ($_smarty_tpl->tpl_vars['product']->value->id==$_smarty_tpl->tpl_vars['data']->value->id){?>black<?php }else{ ?>white nice<?php }?> button radius<?php if ($_smarty_tpl->tpl_vars['product']->value->id==$_smarty_tpl->tpl_vars['data']->value->id){?> disabled<?php }?>" href="<?php if ($_smarty_tpl->tpl_vars['product']->value->id==$_smarty_tpl->tpl_vars['data']->value->id){?>#<?php }else{ ?><?php echo smarty_function_zurl(array('controller'=>'product','action'=>'index','id'=>$_smarty_tpl->tpl_vars['product']->value->id),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['productagregat']->value->name;?>
<?php }?>">
                <?php echo $_smarty_tpl->tpl_vars['product']->value->getSizeString();?>

            </a>&nbsp;

        <?php } ?>
    <?php }?>
    <br/>
</p>
<p class="description"><?php echo $_smarty_tpl->tpl_vars['data']->value->description;?>
</p>
<?php $_smarty_tpl->tpl_vars['agregat'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value->productagregat, null, 0);?>
<?php $_smarty_tpl->tpl_vars['ingredients'] = new Smarty_variable($_smarty_tpl->tpl_vars['agregat']->value->getIngredients(), null, 0);?>
<?php if (!empty($_smarty_tpl->tpl_vars['ingredients']->value)){?>
    <h2 class="subtitle">Skład: </h2>
    <p class="ingredients"><?php echo $_smarty_tpl->tpl_vars['ingredients']->value;?>
</p>
<?php }?>

<div class="alert-box cityChoser">
    <span class="citychooserInfo">Wpisz interesujące Cię miasto:</span>
    <?php echo $_smarty_tpl->tpl_vars['form1']->value;?>

    <span class="small black button radius" id="showPromotions">Pokaż Promocje</span>
</div>

<div class="promotionsList" id="promotionsList">
    <div id="accordion">
        <h3>Aktualne promocje</h3>
        <div>
            <table>
                <?php $_smarty_tpl->tpl_vars['promotions'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value->getCurrentPromotions(), null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['promotions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
        <h3>Przyszłe promocje</h3>
        <div>
            <table>
                <?php $_smarty_tpl->tpl_vars['promotions'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value->getFuturePromotions(), null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['promotions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
    </div>
</div>

<?php }?>

    <script>
            getOffers = function(cid){
             $.get('<?php echo smarty_function_zurl(array('controller'=>'promotion','action'=>'ajaxlist','product'=>$_smarty_tpl->tpl_vars['data']->value->id),$_smarty_tpl);?>
/city/'+cid, function(data) {
                       $('#promotionsList').html(data);
                       $.jStorage.set('cityId', cityId);
                 });
             }
                 
             setSessionCity = function(cityId){
                 $.get('<?php echo smarty_function_zurl(array('controller'=>'city','action'=>'savecity'),$_smarty_tpl);?>
/cityId/'+cityId, function(data) {
                 });
             }


             $(document).ready(function(){
                 cityId = $.jStorage.get('cityId', '');
                     jQuery( "#accordion" ).accordion();
                 $('select#cities').select_autocomplete();
                 $('#cities-element input').addClass('input-text');
                 
                 $('#showPromotions').click(function(){
                    cityId =  $('#cities :selected').val();
                    setSessionCity(cityId);
                    getOffers(cityId);
                 });
                 $('.ac_input.input-text').keypress(function(e){
                      if(e.keyCode == 13){
                          e.preventDefault();
                          cityId =  $('#cities :selected').val();
                          setSessionCity(cityId);
                          getOffers(cityId);
                       }
                  });
                 
            });
    </script>

</div>
<?php echo $_smarty_tpl->getSubTemplate ('file:modules/cityform.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('form'=>$_smarty_tpl->tpl_vars['form2']->value), 0);?>





<?php }} ?>