<div class="reveal-modal" id="cityModal">
    <div class="alert-box cityChoser">
        <span class="citychooserInfo">Wpisz interesujące Cię miasto:</span>
        {$form}
        <span id="setCity" class="small black button radius">Ustaw miasto</span>
    </div>
</div>
<script type="text/javascript">
    {literal}
     $(document).ready(function() {
               cityId = $.jStorage.get('cityId', '');
                   console.log(cityId.length);
                 if(cityId.length==0 || cityId==0){
                     $('select#citiesPopup').select_autocomplete();
                     popup = $('#cityModal').reveal();
                     $('#setCity').click(function(){
                         cityId =  $('#citiesPopup :selected').val();
                         $('select#citiesPopup').val(cityId);
                         $.jStorage.set('cityId', cityId);
                         popup.trigger('reveal:close');
                     });
                     $('select#citiesPopup').val(cityId);
                     $('select#cities').val(cityId);
                 }
               
});
    {/literal}
</script>