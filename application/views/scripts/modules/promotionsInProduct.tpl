{if !empty($currentPromotions) || !empty($futurePromotions)}
    <div id="accordion">
    {if !empty($currentPromotions)}
        <h3>Aktualne promocje</h3>
        <div>
            <table>
                {foreach from=$currentPromotions item=promotion key=key}
                    <tr>
                        <td><a href="{zurl controller=shop action=index id=$promotion->offer->shop->id}" title="{$promotion->offer->shop->name}"><img src="{$promotion->offer->shop->imageUrl}" alt="{$promotion->offer->shop->name}" class="shopLogo"/></a></td>
                        <td>{$promotion->getDateFrom()} - {$promotion->getDateTo()}</td>
                        <td><span class="promotionPrice">{$promotion->getPriceString()}</span></td>
                        <td>{$promotion->promotionComment}</td>
                    </tr>
                {/foreach}
            </table>
        </div>
    {/if}

    {if !empty($futurePromotions)}
        <h3>Przyszłe promocje</h3>
        <div>
            <table>
                {foreach from=$futurePromotions item=promotion key=key}
                    <tr>
                        <td><a href="{zurl controller=shop action=index id=$promotion->offer->shop->id}" title="{$promotion->offer->shop->name}"><img src="{$promotion->offer->shop->imageUrl}" alt="{$promotion->offer->shop->name}" class="shopLogo"/></a></td>
                        <td>{$promotion->getDateFrom()} - {$promotion->getDateTo()}</td>
                        <td><span class="promotionPrice">{$promotion->getPriceString()}</span></td>
                        <td>{$promotion->promotionComment}</td>
                    </tr>
                {/foreach}
            </table>
        </div>
    {/if}
    </div>
{/if}