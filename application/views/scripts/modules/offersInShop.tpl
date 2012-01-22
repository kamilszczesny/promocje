{if !empty($currentOffers)}
    <h2 class="clear">Aktualne promocje</h2>
    {foreach from=$currentOffers item=offer}
        <div class="offerItem">
            <h3 class="offerDates">{$offer->getDateFrom()} - {$offer->getDateTo()}</h3>

            {foreach from=$offer->promotions item=promotion}
                <div class="promotionItemInOffer">
                    {assign var=productImage value=$promotion->product->imageUrl}
                    {if !empty($productImage)}
                        <div class="productImage">
                            <a href="{zurl controller=product action=index id=$promotion->product->id}" title="{$promotion->product->name}">
                            <img src="{$productImage}" alt="{$promotion->product->name}"/>
                            </a>
                        </div>
                    {/if}
                    <div class="promotionInfo">
                        <a href="{zurl controller=product action=index id=$promotion->product->id}" title="{$promotion->product->name}">
                        <span class="promotionName">{$promotion->product->name}</span>
                        <span class="promotionPrice">{$promotion->getPriceString()} PLN</span>
                        </a>
                    </div>
                </div>
            {/foreach}
        </div>
    {/foreach}
{/if}
{if !empty($futureOffers)}
    <h2 class="clear">Przyszłe promocje</h2>
    {foreach from=$futureOffers item=offer}
        <h3 class="offerDates">{$offer->getDateFrom()} - {$offer->getDateTo()}</h3>
        {foreach from=$offer->promotions item=promotion}
            <div class="promotionItemInOffer">
                {assign var=productImage value=$promotion->product->imageUrl}
                {if !empty($productImage)}
                    <div class="productImage">
                        <a href="{zurl controller=product action=index id=$promotion->product->id}" title="{$promotion->product->name}">
                        <img src="{$productImage}" alt="{$promotion->product->name}"/>
                        </a>
                    </div>
                {/if}
                <div class="promotionInfo">
                    <a href="{zurl controller=product action=index id=$promotion->product->id}" title="{$promotion->product->name}">
                    <span class="promotionName">{$promotion->product->name}</span>
                    <span class="promotionPrice">{$promotion->getPriceString()} PLN</span>
                    </a>
                </div>
            </div>
        {/foreach}
    {/foreach}
{/if}
