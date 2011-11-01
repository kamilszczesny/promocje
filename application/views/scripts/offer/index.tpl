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
		$( "#wyborDatyStart" ).datetimepicker(
				{
					hourMin:{/literal} 0,
		            hourMax: 24{literal}
				}
				);
                $( "#wyborDatyStop" ).datetimepicker(
				{
					hourMin:{/literal} 0,
		            hourMax: 24{literal}
				}
				);
	});
</script>
{/literal}
