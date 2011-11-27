{$message}

<div class="eight columns phone-four content">
    {$form}
    <hr/>
    {if !empty($data)}
{foreach from=$data item=item key=key name=agregats}{if !$smarty.foreach.agregats.first}, {/if}{$item->name}{/foreach}
{/if}
</div>

<div class="four phone-two columns">
    {if !empty($form)}
    <iframe src="{zurl controller=photo action=upload}" width="100%" height="auto">
    <p>Twoje przeglądarka nie obsługuje iframów</p>
    </iframe> 
    <iframe src="{zurl controller=photo action=show}" width="100%" height="400">
    <p>Twoje przeglądarka nie obsługuje iframów</p>
    </iframe> 
    {/if}
</div>

{literal}
    <script>
            $(function() {
                    $('select#category').select_autocomplete();
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
