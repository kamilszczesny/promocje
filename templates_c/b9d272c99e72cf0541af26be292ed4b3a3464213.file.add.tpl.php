<?php /* Smarty version Smarty-3.1.6, created on 2012-01-17 20:21:17
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts\category\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72334f15ca2d24f893-71895957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9d272c99e72cf0541af26be292ed4b3a3464213' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts\\category\\add.tpl',
      1 => 1326828071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72334f15ca2d24f893-71895957',
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
  'unifunc' => 'content_4f15ca2d2a9a5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f15ca2d2a9a5')) {function content_4f15ca2d2a9a5($_smarty_tpl) {?><div class="eight columns phone-four content">
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