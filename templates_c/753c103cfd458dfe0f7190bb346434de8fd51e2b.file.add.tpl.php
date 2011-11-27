<?php /* Smarty version Smarty-3.0.7, created on 2011-11-23 20:20:19
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\application/views/scripts/productagregat/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25994ecd4773caa265-55713391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '753c103cfd458dfe0f7190bb346434de8fd51e2b' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\promocje\\application/views/scripts/productagregat/add.tpl',
      1 => 1322075638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25994ecd4773caa265-55713391',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_zurl')) include 'C:\Program Files (x86)\Zend\Apache2\htdocs\promocje\library\Smarty\plugins\function.zurl.php';
?><div class="eight columns phone-four content">
    <?php if (!empty($_smarty_tpl->getVariable('message',null,true,false)->value)){?>
        <div class="alert-box">
            <?php echo $_smarty_tpl->getVariable('message')->value;?>

            <a href="" class="close">×</a>
        </div>
    <?php }?>
    <?php echo $_smarty_tpl->getVariable('form')->value;?>



    
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
</div>