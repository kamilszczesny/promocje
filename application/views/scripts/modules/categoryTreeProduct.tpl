{if !empty($categories)}
    {assign var=data value=$categories}
{/if}
<div class="sideList">
    <div class="sideTitle">Kategorie:</div>
            {foreach from=$data item=item key=key name=categories}
                {if empty($currCat) || $currCat->id != $item->id || count($data)==1}
                <a href="{zurl controller=category action=index id=$item->id}" title="{$item->name}" class="category child level{$item->level} {if $item->id==$currCat->id}selected{/if}{if $smarty.foreach.categories.last} last{/if}">
                    {$item->name}
                </a>
                {/if}
                {if (!$smarty.foreach.categories.last && !empty($currCat) && $currCat->id == $data[$key+1]->id)}
                    {assign var=siblings value=$currCat->getSiblings()}
                    {if !empty($siblings)}
                        {assign var=doneSiblings value=1}
                        {foreach from=$siblings key=k item=i name=c}
                            <a href="{zurl controller=category action=index id=$i->id}" title="{$i->name}" class="category child {if $i->id==$currCat->id}selected{/if}{if $smarty.foreach.c.last} last{/if}">
                                {$i->name}
                            </a>
                        {/foreach}
                    {/if}
                {/if}
            {/foreach}
</div>
{assign var=children value=$currCat->getChildren()}
{if !empty($children)}
    <div class="sideList">
    <div class="sideTitle">Podkategorie:</div>
            {foreach from=$children item=item key=key name=categories}
                <a href="{zurl controller=category action=index id=$item->id}" title="{$item->name}" class="category child {if 0==1}selected{/if}{if $smarty.foreach.categories.last} last{/if}">
                    {$item->name}
                </a>
            {/foreach}
    </div>
{/if}