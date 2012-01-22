<div class="reveal-modal" id="loginModal" style="top: 100px; opacity: 1; visibility: visible;">
    <h2>Zaloguj się</h2>
    <form method="post" action="{zurl controller=login action=index}"><fieldset>
            <input type="text" name="username" value=""/>
            <input type="password" name="password" value=""/>
            <input type="hidden" name="backUrl" value="{$backUrl}"/>
            <input type="submit" name="submit" value="loguj"/>
        </fieldset></form>
        {if !empty($status)}{$status}{/if}
</div>
            <script type="text/javascript">
                {literal}
     $(document).ready(function() {
               $('#loginModal').reveal();
});
    {/literal}
</script>