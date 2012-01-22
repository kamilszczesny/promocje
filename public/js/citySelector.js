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
         $('.selectToAutocomplete').select_autocomplete();
         $('#cities-element input').addClass('input-text');
         $(".offerCitiesButton#current").click(function () {
            $("#currentOffersCities").slideToggle("slow");   
         });
         $('#showPromotions').click(function(){
            cityId =  $('#cities :selected').val();
            setSessionCity(cityId);
            getOffers(cityId);
         });
    });