<?php /* Smarty version Smarty-3.1.6, created on 2012-01-17 19:32:00
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\productagregat\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121804f15bea0424ca5-98665375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43733cf6787e7f69b0aa44876e51c8ec31f9463f' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\productagregat\\add.tpl',
      1 => 1322075638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121804f15bea0424ca5-98665375',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f15bea05c2f6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f15bea05c2f6')) {function content_4f15bea05c2f6($_smarty_tpl) {?><?php if (!is_callable('smarty_function_zurl')) include 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\library\\Smarty\\plugins\\function.zurl.php';
?><div class="eight columns phone-four content">
    <?php if (!empty($_smarty_tpl->tpl_vars['message']->value)){?>
        <div class="alert-box">
            <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

            <a href="" class="close">×</a>
        </div>
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['form']->value;?>



    
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
</div>
<div class="four phone-two columns">
    <iframe src="<?php echo smarty_function_zurl(array('controller'=>'photo','action'=>'upload'),$_smarty_tpl);?>
" width="100%" height="auto">
    <p>Twoje przeglądarka nie obsługuje iframów</p>
    </iframe> 
    <iframe src="<?php echo smarty_function_zurl(array('controller'=>'photo','action'=>'show'),$_smarty_tpl);?>
" width="100%" height="400">
    <p>Twoje przeglądarka nie obsługuje iframów</p>
    </iframe> 
</div><?php }} ?>