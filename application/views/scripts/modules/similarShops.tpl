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