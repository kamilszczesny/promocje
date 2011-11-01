<section class="restaurant">
	{if !empty($data.restaurant.nazwa)}
	<img src="{$data.restaurant.photo}" alt="Restauracja {$data.restaurant.nazwa}"/>
	{/if}
	<h1>{$data.restaurant.nazwa}</h1>
	<ul class="restaurantDetails">
		<li>
			<span>Adres:</span> {$data.restaurant.ulica} {$data.restaurant.nr_budynku}{if !empty($data.restaurant.nr_lokalu)}/{$data.restaurant.nr_lokalu}{/if}. 
			{$data.restaurant.miasto} {$data.restaurant.kod_pocztowy}
		</li>
		<li>
			<span>Email:</span> {$data.restaurant.email}
		</li>
		<li>
			<span>Telefon:</span> {$data.restaurant.tel_kontaktowy}
		</li>
		<li>
			<span>Otwarte:</span> {$data.restaurant.open_from|date_format:'%H:%M'} - {$data.restaurant.open_to|date_format:'%H:%M'}
		</li>
	</ul>
</section>
<aside class="reservationForm">
	<h2>
		Zarezerwuj stolik
	</h2>
	{$form}
</aside>

{literal}
<script>
	$(function() {
		$( "#wyborDatyGodziny" ).datetimepicker(
				{
					hourMin:{/literal} {$hourMin},
		            hourMax: {$hourMax}{literal}
				}
				);
	});
</script>
{/literal}