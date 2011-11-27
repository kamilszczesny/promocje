{$message}
<hr/>
{$form}
<hr/>
{if !empty($data)}
    {foreach from=$data item=item key=key name=agregats}{if !$smarty.foreach.agregats.first}, {/if}{$item->name}{/foreach}
{/if}

{literal}
<script>
	$(function() {
                $('select#productAgregat').select_autocomplete();
	});
</script>
{/literal}