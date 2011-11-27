{if !empty($thumbImage)}
    <script type="text/javascript">
    window.parent.finishUpload("{zurl controller=index action=index}{$thumbImage}");
    </script>
    Zdjęcie dodane na serwer!<br/>
    link do niego został umieszczony w formularzu poniżej.
{else}
    <form enctype="multipart/form-data" action="/promocje/public/photo/upload" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
        Wybierz zdjęcie produktu: <input name="uploadedfile" type="file" /><br/>
        Nazwa obrazka: <input name="name" type="text" />
        <input type="submit" value="Wrzuć na serwer" />
    </form>
{/if}
