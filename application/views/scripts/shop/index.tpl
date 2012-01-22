<div class="three phone-two columns">
    {include file=$smarty.const.APPLICATION_PATH|cat:'\views\scripts\modules\categoryTreeShop.tpl' data=$data->category categories=$categories id=$data->id}
    {include file=$smarty.const.APPLICATION_PATH|cat:'\views\scripts\modules\similarShops.tpl' data=$data->category categories=$categories id=$data->id}
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

        <div class="alert-box cityChoser">
            <span class="citychooserInfo">Wpisz interesujące Cię miasto:</span>
            {$form}
            <span class="small black button radius" id="showPromotions">Pokaż Promocje</span>
        </div>

        <div id="offersContainer">

        </div>

    {/if}
</div>
<script>
    {literal}
        
     getOffers = function(cid){
         $.get('{/literal}{zurl controller=offer action=ajaxlist shop=$data->id}{literal}/city/'+cid, function(data) {
               $('#offersContainer').html(data);
               $.jStorage.set('cityId', cityId);
         });
     }
         
     setSessionCity = function(cityId){
                 $.get('{/literal}{zurl controller=city action=savecity}{literal}/cityId/'+cityId, function(data) {
                 });
     }
        
     
     $(document).ready(function(){
         cityId = $.jStorage.get('cityId', '');
         if(cityId.length>0){
             getOffers(cityId);
             $('select#cities').val(cityId);
         }
         $('select#cities').select_autocomplete();
         $('#cities-element input').addClass('input-text');
         $(".offerCitiesButton#current").click(function () {
            $("#currentOffersCities").slideToggle("slow");   
         });
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
     
        
    {/literal}
</script>