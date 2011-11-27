<!DOCTYPE html>
<html lang="pl" xml:lang="pl">
    <head>
        {*<title>My Weblog</title>
        <link rel="alternate" type="application/atom+xml"
              title="My Weblog feed"
              href="/feed/" />
        <link rel="search" type="application/opensearchdescription+xml"
              title="My Weblog search"
              href="opensearch.xml"  />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" href="{$_view->baseUrl()}/css/anytime.css" type="text/css" />
        <link rel="stylesheet" href="{$_view->baseUrl()}/css/jquery-ui-1.8.16.custom.css" type="text/css" />
        <link rel="stylesheet" href="{$_view->baseUrl()}/css/local.css" type="text/css" />
        <link rel="stylesheet" href="{$_view->baseUrl()}/css/backend.css" type="text/css" />

        <script src="{$_view->baseUrl()}/js/jquery-1.6.2.min.js" type="text/javascript"></script>
        <script src="{$_view->baseUrl()}/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
        <script src="{$_view->baseUrl()}/js/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
        <script src="{$_view->baseUrl()}/js/jquery.autocomplete.pack.js" type="text/javascript"></script>
        <script src="{$_view->baseUrl()}/js/jquery.select-autocomplete.js" type="text/javascript"></script>
        <script src="{$_view->baseUrl()}/js/jquery.form.js" type="text/javascript"></script>*}



{$_view->headMeta()}
{$_view->headLink()}
{$_view->jQuery()->enable()->uiEnable()}     
{$_view->headScript()} 
{$_view->headTitle()} 
    </head>
    <body>
        <div id="body">
            <div class="bodywrap">
                <header>
                    <nav>
                    </nav>
                    {if !empty($displaySgTop)}
                        <div class="sgTop">
                            <div class="searchForm"></div>
                            <img src="images/top1.jpg" alt="top"/>
                        </div>
                    {else}
                        <div class="normalTop">
                        </div>	
                    {/if}
                </header>
                <div class="content">
                    {$_view->layout()->content}
                </div>
                <footer>

                </footer>
            </div>
        </div>
    </body>
</html>