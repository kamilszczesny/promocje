{foreach from=$data item=item key=key}
    <div class="imageSelector">
        <span class="imgName">{$item->name}</span>
        <img src="{$_view->baseUrl()}/{$item->imageUrl}" alt="{$item->name}"/>
    </div>
{/foreach}

<script>
{literal}
    $(document).ready(function(){
        $('.imageSelector').bind('click',function(event){
            img = $(this);
            $('.imageSelector').removeClass('selectedPhoto');
            img.addClass('selectedPhoto');
            url = img.find('img').attr('src');
            window.parent.finishUpload(url);
        });
    });
{/literal}
</script>
