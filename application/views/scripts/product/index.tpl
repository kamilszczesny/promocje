<div class="three phone-two columns">
    {assign var=cat1 value=$data->getMainCategory()}
    {assign var=categories value=$data->getCategories()}
    {if !empty($cat1)}
        {include file='file:modules/categoryTreeProduct.tpl' data=$categories currCat=$cat1}
        {include file='file:modules/similarProducts.tpl' data=$cat1}
    {/if}
</div>
<div class="nine columns phone-four mainColumn">
    {if !empty($data)}
    {capture assign=imageUrl}{$data->imageUrl}{/capture}
{if empty($imageUrl)}{capture assign=imageUrl}{$data->productagregat->imageUrl}{/capture}{/if}

{if !empty($imageUrl)}
    <div class="productImage">
        <img src="{$imageUrl}" alt="{$data->name}"/>
    </div>
{/if}
<h1 class="name">{$data->name}</h1>
<p>
    {if !empty($data->productagregat->products)}
        {foreach from=$data->productagregat->products item=product key=key}

            <a class="small {if $product->id == $data->id}black{else}white nice{/if} button radius{if $product->id == $data->id} disabled{/if}" href="{if $product->id == $data->id}#{else}{zurl controller=product action=index id=$product->id}" title="{$productagregat->name}{/if}">
                {$product->getSizeString()}
            </a>&nbsp;

        {/foreach}
    {/if}
    <br/>
</p>
<p class="description">{$data->description}</p>
{assign var=agregat value=$data->productagregat}
{assign var=ingredients value=$agregat->getIngredients()}
{if !empty($ingredients)}
    <h2 class="subtitle">Skład: </h2>
    <p class="ingredients">{$ingredients}</p>
{/if}

<div class="alert-box cityChoser">
    <span class="citychooserInfo">Wpisz interesujące Cię miasto:</span>
    {$form1}
    <span class="small black button radius" id="showPromotions">Pokaż Promocje</span>
</div>

<div class="promotionsList" id="promotionsList">
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
            getOffers = function(cid){
             $.get('{/literal}{zurl controller=promotion action=ajaxlist product=$data->id}{literal}/city/'+cid, function(data) {
                       $('#promotionsList').html(data);
                       $.jStorage.set('cityId', cityId);
                 });
             }
                 
             setSessionCity = function(cityId){
                 $.get('{/literal}{zurl controller=city action=savecity}{literal}/cityId/'+cityId, function(data) {
                 });
             }


             $(document).ready(function(){
                 cityId = $.jStorage.get('cityId', '');
                     jQuery( "#accordion" ).accordion();
                 $('select#cities').select_autocomplete();
                 $('#cities-element input').addClass('input-text');
                 
                 $('#showPromotions').click(function(){
                    cityId =  $('#cities :selected').val();
                    setSessionCity(cityId);
                    getOffers(cityId);
                 });
                 $('.ac_input.input-text').keypress(function(e){
                      if(e.keyCode == 13){
                          e.preventDefault();
                          cityId =  $('#cities :selected').val();
                          setSessionCity(cityId);
                          getOffers(cityId);
                       }
                  });
                 
            });
    </script>
{/literal}
</div>
{include file='file:modules/cityform.tpl' form=$form2}




