<?php /* Smarty version Smarty-3.1.6, created on 2012-01-14 21:20:09
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\product\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168954f11e379055ee9-19036060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c84f2d72c3d6e68becd19372437ed5b71a1b159c' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\product\\add.tpl',
      1 => 1326540219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168954f11e379055ee9-19036060',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form' => 0,
    'message' => 0,
    'data' => 0,
    'item' => 0,
    'backurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f11e3792484c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f11e3792484c')) {function content_4f11e3792484c($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><?php if (!empty($_smarty_tpl->tpl_vars['form']->value)){?>
<?php if (!empty($_smarty_tpl->tpl_vars['message']->value)){?><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
<?php }?>
<hr/>
<iframe src="<?php echo smarty_function_zurl(array('controller'=>'photo','action'=>'upload'),$_smarty_tpl);?>
" width="100%" height="75">
  <p>Twoje przeglądarka nie obsługuje iframów</p>
</iframe> 
<iframe src="<?php echo smarty_function_zurl(array('controller'=>'photo','action'=>'show'),$_smarty_tpl);?>
" width="100%" height="200">
  <p>Twoje przeglądarka nie obsługuje iframów</p>
</iframe> 
<hr/>

<?php echo $_smarty_tpl->tpl_vars['form']->value;?>


<hr/>
<?php if (!empty($_smarty_tpl->tpl_vars['data']->value)){?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->index++;
 $_smarty_tpl->tpl_vars['item']->first = $_smarty_tpl->tpl_vars['item']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['agregats']['first'] = $_smarty_tpl->tpl_vars['item']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['agregats']['first']){?>, <?php }?><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
<?php } ?>
<?php }?>


    <script>
            $(function() {
                    $('select#productAgregat').select_autocomplete();
            });
    </script>


<script type="text/javascript">
    
          $(document).ready(function() {
                  window.finishUpload = function(fileUrl) {
                      $('#imageUrl').val(fileUrl);
            };
          });
              
    
</script>
<?php }else{ ?>
    <?php $_smarty_tpl->_capture_stack[] = array('default', 'backurl', null); ob_start(); ?><?php echo smarty_function_zurl(array('controller'=>'shop','action'=>'add'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php echo $_smarty_tpl->getSubTemplate ((@APPLICATION_PATH).('\views\scripts\modules\loginform.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('backUrl'=>$_smarty_tpl->tpl_vars['backurl']->value), 0);?>

<?php }?>

<?php }} ?>