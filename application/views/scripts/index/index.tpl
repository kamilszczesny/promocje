<div class="row sgPage">
    <div class="three columns">
        {include file='file:modules/categoryTree.tpl' categories=$categories}
        <h2>Reklama</h2>
    </div>
    <div class="nine columns">
        <div class="row">
            <div class="six columns">
                <h2>Szukaj Produktu</h2>
                {$productSearchForm}
                <span id="productsSearch" class="small black button radius">Wybierz produkt</span>
                {include file='file:modules/sgSearchJs.tpl' fieldId='#products' buttonId='#productsSearch'}
            </div>
            <div class="six columns">
                <h2>Szukaj Sklepu</h2>
                {$shopSearchForm}
                <span id="shopsSearch" class="small black button radius">Wybierz sklep</span>
                {include file='file:modules/sgSearchJs.tpl' fieldId='#shops' buttonId='#shopsSearch'}
            </div>
        </div>
        <h2>Najciekawsze Oferty</h2>
        {*<div class="row">*}

        {* <div class="twelve columns">*}

        {foreach from=$popularPromotions item=promotion key=key}
            {assign var=product value=$promotion->product}
            {if $key%4==0}
                <div class="row">
                {/if}
                <div class="three columns productBlurb">
                {capture assign=imageUrl}{$product->imageUrl}{/capture}
        {if empty($imageUrl)}{capture assign=imageUrl}{$product->imageUrl}{/capture}{/if}
        {if !empty($imageUrl)}
            <div class="productImage">
                <a href="{zurl controller=product action=index id=$product->id}" title="{$product->name}">
                    <img src="{$imageUrl}" alt="{$product->name}"/>
                </a>
            </div>
        {/if}
        <h4><a href="{zurl controller=product action=index id=$product->id}" title="{$product->name}">{$product->name}</a></h4>
    </div>
    {if $key%4==3}
    </div>
{/if}
{/foreach}
{*<h2>Najnowsze Gazetki Promocyjne</h2>
{foreach from=$newestOffers item=item key=key}
{$item->name}
{/foreach}*}
{* </div>*}
{*  </div>*}
</div>

</div>
    {literal}
        <script>
                goToShop = function(sid){
                    window.location.href = '{/literal}{zurl controller=shop action=index}{literal}/index/id/'+sid;
                 }
                 goToProduct = function(pid){
                    window.location.href = '{/literal}{zurl controller=productagregat action=index}{literal}/index/id/'+pid;
                 }
                 $(document).ready(function(){                 
                     $('#productsSearch').click(function(){
                        productId =  $('#productSearch :selected').val();
                        goToProduct(productId);
                     });
          $('#productSearch').keypress(function(e){
              if(e.keyCode == 13){
                  e.preventDefault();
                  productId =  $('#productSearch :selected').val();
                  goToProduct(productId);
               }
          });
          $('#shopsSearch').click(function(){
                shopId =  $('#shopSearch :selected').val();
                goToShop(shopId);
            });
                 
          });
          $('#shopSearch').keypress(function(e){
              if(e.keyCode == 13){
                  e.preventDefault();
                  shopId =  $('#shopSearch :selected').val();
                  goToShop(shopId);
               }
          });
        </script>
    {/literal}