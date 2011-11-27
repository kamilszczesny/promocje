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
                $('select#offer').select_autocomplete();
                $('select#product').select_autocomplete();
	});
</script>
{/literal}