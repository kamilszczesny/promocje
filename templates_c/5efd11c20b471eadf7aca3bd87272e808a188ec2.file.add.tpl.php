<?php /* Smarty version Smarty-3.0.7, created on 2011-11-22 18:37:32
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/shop/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72834ecbdddc57c892-79819332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5efd11c20b471eadf7aca3bd87272e808a188ec2' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/shop/add.tpl',
      1 => 1321983446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72834ecbdddc57c892-79819332',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_zurl')) include 'C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\library\Smarty\plugins\function.zurl.php';
?><?php echo $_smarty_tpl->getVariable('message')->value;?>


<div class="eight columns phone-four content">
    <?php echo $_smarty_tpl->getVariable('form')->value;?>

    <hr/>
    <?php if (!empty($_smarty_tpl->getVariable('data',null,true,false)->value)){?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->index++;
 $_smarty_tpl->tpl_vars['item']->first = $_smarty_tpl->tpl_vars['item']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['agregats']['first'] = $_smarty_tpl->tpl_vars['item']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['agregats']['first']){?>, <?php }?><?php echo $_smarty_tpl->getVariable('item')->value->name;?>
<?php }} ?>
<?php }?>
</div>

<div class="four phone-two columns">
    <?php if (!empty($_smarty_tpl->getVariable('form',null,true,false)->value)){?>
    <iframe src="<?php echo smarty_function_zurl(array('controller'=>'photo','action'=>'upload'),$_smarty_tpl);?>
" width="100%" height="auto">
    <p>Twoje przeglądarka nie obsługuje iframów</p>
    </iframe> 
    <iframe src="<?php echo smarty_function_zurl(array('controller'=>'photo','action'=>'show'),$_smarty_tpl);?>
" width="100%" height="400">
    <p>Twoje przeglądarka nie obsługuje iframów</p>
    </iframe> 
    <?php }?>
</div>


    <script>
            $(function() {
                    $('select#category').select_autocomplete();
            });
    </script>


<script type="text/javascript">
    
          $(document).ready(function() {
                  window.finishUpload = function(fileUrl) {
                      $('#imageUrl').val(fileUrl);
            };
          });
              
    
</script>