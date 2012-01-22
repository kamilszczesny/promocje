{if !empty($form)}
{if !empty($message)}{$message}{/if}
<hr/>
<iframe src="{zurl controller=photo action=upload}" width="100%" height="75">
  <p>Twoje przeglądarka nie obsługuje iframów</p>
</iframe> 
<iframe src="{zurl controller=photo action=show}" width="100%" height="200">
  <p>Twoje przeglądarka nie obsługuje iframów</p>
</iframe> 
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

<script type="text/javascript">
    {literal}
          $(document).ready(function() {
                  window.finishUpload = function(fileUrl) {
                      $('#imageUrl').val(fileUrl);
            };
          });
              
    {/literal}
</script>
{else}
    {capture assign=backurl}{zurl controller=shop action=add}{/capture}
    {include file=$smarty.const.APPLICATION_PATH|cat:'\views\scripts\modules\loginform.tpl' backUrl=$backurl}
{/if}

