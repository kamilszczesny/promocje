<div class="three phone-two columns">
    {include file=$smarty.const.APPLICATION_PATH|cat:'\views\scripts\modules\categoryTreeShop.tpl' data=$data->category categories=$categories id=$data->id}
</div>
<div class="nine columns phone-four">
    {if !empty($data)}
        {assign var=imageUrl value=$data->imageUrl}
        {if !empty($imageUrl)}
            <div class="shopImage">
                <img src="{$data->imageUrl}" alt="{$data->name}" class="shopLogo"/>
            </div>
        {/if}
        <h1>{$data->name}</h1>
        <p>{$data->description}</p>
        <h2 class="clear">Najnowsze promocje</h2>
        {if !$data->offers->isEmpty()}
            {foreach from=$data->offers item=offer}
                <h3 class="offerDates">{$offer->getDateFrom()} - {$offer->getDateTo()}</h3>
                {foreach from=$offer->promotions item=promotion}
                    <div class="promotionItemInOffer">
                        {assign var=productImage value=$promotion->product->imageUrl}
                        {if !empty($productImage)}
                            <div class="productImage">
                                <img src="{$productImage}" alt="{$promotion->product->name}"/>
                            </div>
                        {/if}
                        <div class="promotionInfo">
                            <span class="promotionName">{$promotion->product->name}</span>
                            <span class="promotionPrice">{$promotion->getPriceString()} PLN</span>
                        </div>
                    </div>
                {/foreach}
            {/foreach}
        {/if}
    {/if}
</div>