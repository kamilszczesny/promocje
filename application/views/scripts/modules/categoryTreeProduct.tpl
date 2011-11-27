<div class="sideList">
    <div class="sideTitle">Kategorie:</div>
    {assign var=categoryName value=$data->name}
    {if !empty($categoryName)}
        <a href="{zurl controller=category action=index id=$data->parent->id}" title="{$data->parent->name}" class="category parent">
            {$data->parent->name}
        </a>
        {foreach from=$data->parent->children item=item key=key name=categories}
            <a href="{zurl controller=category action=index id=$item->id}" title="{$item->name}" class="category child {if $item->id==$data->id}selected{/if}{if $smarty.foreach.categories.last} last{/if}">
                {$item->name}
            </a>
        {/foreach}
    {/if}
</div>
<div class="sideList products">
    <div class="sideTitle">Podobne produkty:</div>
    {foreach from=$data->productagregats item=item key=key name=similar}
        <a href="{zurl controller=productagregat action=view id=$item->id}" {if $smarty.foreach.similar.last}class="last"{/if}>
            {assign var=imageUrl value=$item->imageUrl}
            {if !empty($imageUrl)}
                <img src="{$imageUrl}" alt="{$item->name}" class="similarImg"/>
            {/if}
            {$item->name}
        </a>
    {/foreach}
</div>