{$message}
<hr/>
{$form}
<hr/>
{if !empty($data)}
    {foreach from=$data item=item key=key name=cities}{if !$smarty.foreach.cities.first}, {/if}{$item->name}{/foreach}
{/if}
{literal}
<script>
	$(function() {
		$( "#wyborDatyStart" ).datepicker({dateFormat: 'yy-mm-dd'});
                $( "#wyborDatyStop" ).datepicker({dateFormat: 'yy-mm-dd'});
                $('select#shop').select_autocomplete();
                //$('select#shop').show();
	});
</script>
{/literal}
