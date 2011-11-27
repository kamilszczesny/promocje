{$message}
<hr/>
{$form}
<hr/>
{if !empty($data)}
    {foreach from=$data item=item key=key name=agregats}{if !$smarty.foreach.agregats.first}, {/if}{$item->promotionComment}{/foreach}
{/if}

{literal}
<script>
	$(function() {
		$( "#wyborDatyStart" ).datepicker({dateFormat: 'yy-mm-dd'});
                $( "#wyborDatyStop" ).datepicker({dateFormat: 'yy-mm-dd'});
                $('select#offer').select_autocomplete();
                $('select#product').select_autocomplete();
                //$('select#shop').show();
	});
</script>
{/literal}
