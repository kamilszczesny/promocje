
<div class="sideList products">
    <div class="sideTitle">Podobne produkty:</div>
    {foreach from=$data->productagregats item=item key=key name=similar}
        <a href="{zurl controller=productagregat action=index id=$item->id}" {if $smarty.foreach.similar.last}class="last"{/if}>
            {assign var=imageUrl value=$item->imageUrl}
            {if !empty($imageUrl)}
                <img src="{$imageUrl}" alt="{$item->name}" class="similarImg"/>
            {/if}
            {$item->name}
        </a>
    {/foreach}
</div>