<div class="eight columns phone-four content">
    {if !empty($message)}
    <div class="alert-box">
        {$message}
        <a href="" class="close">×</a>
    </div>
{/if}
    {$form}


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
</div>
<div class="four phone-two columns">
    <iframe src="{zurl controller=photo action=upload}" width="100%" height="auto">
    <p>Twoje przeglądarka nie obsługuje iframów</p>
    </iframe> 
    <iframe src="{zurl controller=photo action=show}" width="100%" height="400">
    <p>Twoje przeglądarka nie obsługuje iframów</p>
    </iframe> 
</div>

