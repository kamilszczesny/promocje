{if empty($categories)}{assign var=categories value=null}{/if}
<div class="three phone-two columns">
    {if $data->level==0}
        {include file='file:modules/categoryTreeProduct.tpl' currCat=$data categories=$categories}
    {else}
        {include file='file:modules/categoryTreeProduct.tpl' currCat=$data data=$data->getCategoryTree()}
    {/if}
</div>
<div class="nine columns phone-four">
    <h1>{$data->name}</h1>    
    {foreach from=$data->productagregats item=productagregat key=key}
        {if $key%2==0}
            <div class="row">
        {/if}
        <div class="productAgregat six columns">
            <a href="{zurl controller=product action=index id=$productagregat->products[0]->id}" title="{$productagregat->name}">
                {$productagregat->name}        
            </a>
            <div class="productAgregatInsideWrapper">
                    {assign var=imageUrl value=$productagregat->imageUrl}
                {if !empty($imageUrl)}
                    <div class="productImage">
                        <img src="{$imageUrl}" alt="{$data->name}"/>
                    </div>
                {/if}
                <ul class="productSizesList">
                    {foreach from=$productagregat->products item=product}
                        <li>
                            <a class="small white nice button radius" href="{zurl controller=product action=index id=$product->id}" title="{$productagregat->name}">
                            {$product->getSizeString()}
                            </a>
                            {assign var=smallestPrice value=$product->getSmallestCurrentPrice()}
                            {if !empty($smallestPrice)}
                                <span class="minimalPrice"> od {$product->getSmallestCurrentPrice()} PLN</span>
                            {/if}
                        </li>
                    {/foreach}
                </ul>
            </div>
        </div>
                {if $key%2==1}
            </div>
        {/if}
    {/foreach}
</div>