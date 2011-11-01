<?php /* Smarty version Smarty-3.0.7, created on 2011-08-27 13:23:49
         compiled from "C:\Program Files (x86)\Zend\Apache2\htdocs\test2\application/views/scripts/restaurant/view.phtml" */ ?>
<?php /*%%SmartyHeaderCode:84264e58d3c5414706-75082726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e96a547971b3a71a7085717d33fadea2452a6827' => 
    array (
      0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\test2\\application/views/scripts/restaurant/view.phtml',
      1 => 1314444225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84264e58d3c5414706-75082726',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\Program Files (x86)\Zend\Apache2\htdocs\test2\library\Smarty\plugins\modifier.date_format.php';
?><section class="restaurant">
	<?php if (!empty($_smarty_tpl->getVariable('data',null,true,false)->value['restaurant']['nazwa'])){?>
	<img src="<?php echo $_smarty_tpl->getVariable('data')->value['restaurant']['photo'];?>
" alt="Restauracja <?php echo $_smarty_tpl->getVariable('data')->value['restaurant']['nazwa'];?>
"/>
	<?php }?>
	<h1><?php echo $_smarty_tpl->getVariable('data')->value['restaurant']['nazwa'];?>
</h1>
	<ul class="restaurantDetails">
		<li>
			<span>Adres:</span> <?php echo $_smarty_tpl->getVariable('data')->value['restaurant']['ulica'];?>
 <?php echo $_smarty_tpl->getVariable('data')->value['restaurant']['nr_budynku'];?>
<?php if (!empty($_smarty_tpl->getVariable('data',null,true,false)->value['restaurant']['nr_lokalu'])){?>/<?php echo $_smarty_tpl->getVariable('data')->value['restaurant']['nr_lokalu'];?>
<?php }?>. 
			<?php echo $_smarty_tpl->getVariable('data')->value['restaurant']['miasto'];?>
 <?php echo $_smarty_tpl->getVariable('data')->value['restaurant']['kod_pocztowy'];?>

		</li>
		<li>
			<span>Email:</span> <?php echo $_smarty_tpl->getVariable('data')->value['restaurant']['email'];?>

		</li>
		<li>
			<span>Telefon:</span> <?php echo $_smarty_tpl->getVariable('data')->value['restaurant']['tel_kontaktowy'];?>

		</li>
		<li>
			<span>Otwarte:</span> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['restaurant']['open_from'],'%H:%M');?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['restaurant']['open_to'],'%H:%M');?>

		</li>
	</ul>
</section>
<aside class="reservationForm">
	<h2>
		Zarezerwuj stolik
	</h2>
	<?php echo $_smarty_tpl->getVariable('form')->value;?>

</aside>


<script>
	$(function() {
		$( "#wyborDatyGodziny" ).datetimepicker(
				{
					hourMin: <?php echo $_smarty_tpl->getVariable('hourMin')->value;?>
,
		            hourMax: <?php echo $_smarty_tpl->getVariable('hourMax')->value;?>

				}
				);
	});
</script>
