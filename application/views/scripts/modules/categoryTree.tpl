<div class="sideList">
    <div class="sideTitle">Kategorie:</div>
        {foreach from=$categories item=item key=key name=categories}
            <a href="{zurl controller=category action=index id=$item->id}" title="{$item->name}" class="category child {if !empty($data.0->id) && $item->id==$data.0->id}selected{/if}{if $smarty.foreach.categories.last} last{/if}">
                {$item->name}
            </a>
        {/foreach}
</div>