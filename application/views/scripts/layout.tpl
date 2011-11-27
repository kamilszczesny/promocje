<!DOCTYPE html>
<html lang="pl" xml:lang="pl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>My Weblog</title>

        <link rel="shortcut icon" href="/favicon.ico" />

        {$_view->headMeta()}
        {$_view->headLink()}
        {*$_view->jQuery()->enable()*}     
        {$_view->headScript()} 
        {$_view->headTitle()} 
    </head>
    <body>


        <div class="row display">
            <div class="twelwe phone-eight centered columns">
                <div class="row display">
                    <div class="twelwe phone-eight centered columns">
                        <header>
                            <nav>
                                <div class="navElement first active"><a href="{zurl controller=index action=index}" title="Start">Start</a></div>
                                <div class="navElement"><a href="{zurl controller=shop action=viewall}" title="Sklepy">Sklepy</a></div>
                                <div class="navElement"><a href="{zurl controller=offer action=viewactual}" title="aktualne gazetki">Aktualne gazetki</a></div>
                                <div class="navElement"><a href="{zurl controller=product action=viewall}" title="Produkty">Produkty</a></div>
                                <div class="navElement"><a href="{zurl controller=offer action=viewpopular}" title="Polecane oferty">Polecane oferty</a></div>
                            </nav>
                            {if !empty($displaySgTop)}

                            {else}

                            {/if}
                        </header>
                    </div>
                </div>
                <div class="row display">
                    <div class="twelwe phone-eight centered columns">
                        {$_view->layout()->content}
                    </div>
                </div>
            </div>
        </div>
        <footer>

        </footer>

    </body>
</html>