<div class="sideList">
    <div class="sideTitle">Kategorie:</div>
    {if is_object($data)}
        {assign var=dataId value=$data->id}
    {else}
        {assign var=dataId value=$data.0->id}
    {/if}
    {assign var=categoryName value=$data->name}
    {if !empty($categoryName)}
        {foreach from=$categories item=item key=key name=categories}
            <a href="{zurl controller=shopcategory action=index id=$item->id}" title="{$item->name}" class="category {if $item->id==$dataId}selected{/if}{if $smarty.foreach.categories.last} last{/if}">
                {$item->name}
            </a>
        {/foreach}
    {/if}
</div>