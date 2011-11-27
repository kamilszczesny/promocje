<h1>{$data->name}</h1>
{foreach from=$data->productagregats item=productagregat}
    <div class="productAgregat">
        <a href="{zurl controller=product action=index id=$productagregat->products[0]->id}" title="{$productagregat->name}">
            {$productagregat->name}        
        </a>
        <div class="productAgregatInsideWrapper">
            {assign var=imageUrl value=$data->imageUrl}
            {if empty($imageUrl)}
            {assign var=imageUrl value=$productagregat->imageUrl}
            {/if}
            {if !empty($imageUrl)}
                <div class="productImage">
                    <img src="{$imageUrl}" alt="{$data->name}"/>
                </div>
            {/if}
            <ul class="productSizesList">
                {foreach from=$productagregat->products item=product}
                    <span class="productSizeButton">
                        <a href="{zurl controller=product action=index id=$product->id}" title="{$productagregat->name}">
                            {$product->getSizeString()}
                        </a>
                        {assign var=smallestPrice value=$product->getSmallestCurrentPrice()}
                        {if !empty($smallestPrice)}
                            <span class="minimalPrice"> od {$product->getSmallestCurrentPrice()} PLN</span>
                        {/if}
                    </span>
                {/foreach}
            </ul>
        </div>
    </div>

{/foreach}
{include file="components/test.tpl"}