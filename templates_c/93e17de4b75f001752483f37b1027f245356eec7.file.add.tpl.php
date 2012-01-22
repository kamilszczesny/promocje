<?php /* Smarty version Smarty-3.1.6, created on 2012-01-22 11:22:44
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\shopcategory\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193124f1be37440be52-75743026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93e17de4b75f001752483f37b1027f245356eec7' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\shopcategory\\add.tpl',
      1 => 1327227761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193124f1be37440be52-75743026',
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
  'unifunc' => 'content_4f1be37446de0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f1be37446de0')) {function content_4f1be37446de0($_smarty_tpl) {?><div class="eight columns phone-four content">
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
<?php }} ?>