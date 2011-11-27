<div class="three phone-two columns">
    {include file=$smarty.const.APPLICATION_PATH|cat:'\views\scripts\modules\categoryTreeProduct.tpl' data=$data->productagregat->category}
</div>
<div class="nine columns phone-four">
    {if !empty($data)}
    {capture assign=imageUrl}{$data->imageUrl}{/capture}
{if empty($imageUrl)}{capture assign=imageUrl}{$data->productagregat->imageUrl}{/capture}{/if}

{if !empty($imageUrl)}
    <div class="productImage">
        <img src="{$imageUrl}" alt="{$data->name}"/>
    </div>
{/if}
<h1 class="name">{$data->name}</h1>
{foreach from=$data->productagregat->products item=item key=key}
    <span class="sizeChangeButton">
        <a href="{zurl controller=product action=index id=$item->id}" title="{$data->name} {$item->getSizeString()}">
            {$item->getSizeString()}        
        </a>
    </span>
{/foreach}
<p class="description">{$data->description}</p>
{capture assign=ingredients}{$data->productagregat->ingredients}{/capture}
{if !empty($ingredients)}
    <h2 class="subtitle">Skład: </h2>
    <p class="ingredients">{$ingredients}</p>
{/if}

<div class="promotionsList">
    <div id="accordion">
        <h3>Aktualne promocje</h3>
        <div>
            <table>
                {assign var=promotions value=$data->getCurrentPromotions()}
                {foreach from=$promotions item=promotion key=key}
                    <tr>
                        <td><a href="{zurl controller=shop action=index id=$promotion->offer->shop->id}" title="{$promotion->offer->shop->name}"><img src="{$promotion->offer->shop->imageUrl}" alt="{$promotion->offer->shop->name}" class="shopLogo"/></a></td>
                        <td>{$promotion->getDateFrom()} - {$promotion->getDateTo()}</td>
                        <td><span class="promotionPrice">{$promotion->getPriceString()}</span></td>
                        <td>{$promotion->promotionComment}</td>
                    </tr>
                {/foreach}
            </table>
        </div>
        <h3>Przyszłe promocje</h3>
        <div>
            <table>
                {assign var=promotions value=$data->getFuturePromotions()}
                {foreach from=$promotions item=promotion key=key}
                    <tr>
                        <td><a href="{zurl controller=shop action=index id=$promotion->offer->shop->id}" title="{$promotion->offer->shop->name}"><img src="{$promotion->offer->shop->imageUrl}" alt="{$promotion->offer->shop->name}" class="shopLogo"/></a></td>
                        <td>{$promotion->getDateFrom()} - {$promotion->getDateTo()}</td>
                        <td><span class="promotionPrice">{$promotion->getPriceString()}</span></td>
                        <td>{$promotion->promotionComment}</td>
                    </tr>
                {/foreach}
            </table>
        </div>
    </div>
</div>

{/if}
{literal}
    <script>
            $(document).ready(function() {
                    jQuery( "#accordion" ).accordion();
            });
    </script>
{/literal}
</div>




