<div class="sideList">
    <div class="sideTitle">Kategorie:</div>
    {assign var=categoryName value=$data->name}
    {if !empty($categoryName)}
        {foreach from=$categories item=item key=key name=categories}
            <a href="{zurl controller=shopcategory action=index id=$item->id}" title="{$item->name}" class="category {if $item->id==$data->id}selected{/if}{if $smarty.foreach.categories.last} last{/if}">
                {$item->name}
            </a>
        {/foreach}
    {/if}
</div>
<div class="sideList">
    <div class="sideTitle">Podobne sklepy:</div>
    {foreach from=$data->shops item=item key=key name=similar}
        {if $id!=$item->id}
        <a href="{zurl controller=shop action=index id=$item->id}" {if $smarty.foreach.similar.last}class="last"{/if}>

            {$item->name}
        </a>
        {/if}
    {/foreach}
</div>