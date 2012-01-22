<div class="three phone-two columns">
    {assign var=cat1 value=$data->getMainCategory()}
    {assign var=categories value=$data->getCategories()}
    {if !empty($cat1)}
        {include file='file:modules/categoryTreeProduct.tpl' data=$categories currCat=$cat1}
        {include file='file:modules/similarProducts.tpl' data=$cat1}
    {/if}
</div>
<div class="nine columns phone-four">
    <h1>Rodzaje i wielkości {$data->name}</h1>
    {foreach from=$data->products item=product key=key}
        {if $key%4==0}
            <div class="row">
            {/if}
            <div class="three columns productBlurb">
            {capture assign=imageUrl}{$product->imageUrl}{/capture}
            {if empty($imageUrl)}{capture assign=imageUrl}{$data->imageUrl}{/capture}{/if}
            {if !empty($imageUrl)}
                <div class="productImage">
                    <a href="{zurl controller=product action=index id=$product->id}" title="{$product->name}">
                    <img src="{$imageUrl}" alt="{$data->name}"/>
                    </a>
                </div>
            {/if}
            <h4><a href="{zurl controller=product action=index id=$product->id}" title="{$product->name}">{$product->name}</a></h4>
            </div>
{if $key%4==3}
</div>
{/if}
{/foreach}
</div>





