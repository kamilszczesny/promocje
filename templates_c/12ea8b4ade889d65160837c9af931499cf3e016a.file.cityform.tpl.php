<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 19:18:03
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\modules\cityform.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147784f11c6db0e9a83-57354528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12ea8b4ade889d65160837c9af931499cf3e016a' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\modules\\cityform.tpl',
      1 => 1323288297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147784f11c6db0e9a83-57354528',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11c6db16825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11c6db16825')) {function content_4f11c6db16825($_smarty_tpl) {?><div class="reveal-modal" id="cityModal">
    <div class="alert-box cityChoser">
        <span class="citychooserInfo">Wpisz interesujące Cię miasto:</span>
        <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

        <span id="setCity" class="small black button radius">Ustaw miasto</span>
    </div>
</div>
<script type="text/javascript">
    
     $(document).ready(function() {
               cityId = $.jStorage.get('cityId', '');
                   console.log(cityId.length);
                 if(cityId.length==0 || cityId==0){
                     $('select#citiesPopup').select_autocomplete();
                     popup = $('#cityModal').reveal();
                     $('#setCity').click(function(){
                         cityId =  $('#citiesPopup :selected').val();
                         $('select#citiesPopup').val(cityId);
                         $.jStorage.set('cityId', cityId);
                         popup.trigger('reveal:close');
                     });
                     $('select#citiesPopup').val(cityId);
                     $('select#cities').val(cityId);
                 }
               
});
    
</script><?php }} ?>