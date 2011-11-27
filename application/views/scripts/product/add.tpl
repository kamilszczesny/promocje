{$message}
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

<p id="message"></p>

<p id="result"></p>

