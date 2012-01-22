<?php /* Smarty version Smarty-3.1.6, created on 2012-01-22 11:35:39
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\shop\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:251184f11ce8b4d7c06-34690333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b52bd2bad76391db0132fbc5b2893f1ba158ec4' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\shop\\index.tpl',
      1 => 1326574675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '251184f11ce8b4d7c06-34690333',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11ce8b71312',
  'variables' => 
  array (
    'data' => 0,
    'categories' => 0,
    'imageUrl' => 0,
    'form' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11ce8b71312')) {function content_4f11ce8b71312($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><div class="three phone-two columns">
    <?php echo $_smarty_tpl->getSubTemplate ((@APPLICATION_PATH).('\views\scripts\modules\categoryTreeShop.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('data'=>$_smarty_tpl->tpl_vars['data']->value->category,'categories'=>$_smarty_tpl->tpl_vars['categories']->value,'id'=>$_smarty_tpl->tpl_vars['data']->value->id), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ((@APPLICATION_PATH).('\views\scripts\modules\similarShops.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('data'=>$_smarty_tpl->tpl_vars['data']->value->category,'categories'=>$_smarty_tpl->tpl_vars['categories']->value,'id'=>$_smarty_tpl->tpl_vars['data']->value->id), 0);?>

</div>
<div class="nine columns phone-four">
    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?>
        <?php $_smarty_tpl->tpl_vars['imageUrl'] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value->imageUrl, null, 0);?>
        <?php if (!empty($_smarty_tpl->tpl_vars['imageUrl']->value)){?>
            <div class="shopImage">
                <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value->imageUrl;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
" class="shopLogo"/>
            </div>
        <?php }?>
        <h1><?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
</h1>
        <p><?php echo $_smarty_tpl->tpl_vars['data']->value->description;?>
</p>

        <div class="alert-box cityChoser">
            <span class="citychooserInfo">Wpisz interesujące Cię miasto:</span>
            <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

            <span class="small black button radius" id="showPromotions">Pokaż Promocje</span>
        </div>

        <div id="offersContainer">

        </div>

    <?php }?>
</div>
<script>
    
        
     getOffers = function(cid){
         $.get('<?php echo smarty_function_zurl(array('controller'=>'offer','action'=>'ajaxlist','shop'=>$_smarty_tpl->tpl_vars['data']->value->id),$_smarty_tpl);?>
/city/'+cid, function(data) {
               $('#offersContainer').html(data);
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
         if(cityId.length>0){
             getOffers(cityId);
             $('select#cities').val(cityId);
         }
         $('select#cities').select_autocomplete();
         $('#cities-element input').addClass('input-text');
         $(".offerCitiesButton#current").click(function () {
            $("#currentOffersCities").slideToggle("slow");   
         });
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
     
        
    
</script><?php }} ?>