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
</div>
