{foreach from=$xml->item item=itemPos name=items}
  {if $itemPos->hook == 'home'}{assign var='HomeHook' value='true'}{/if}
{/foreach}
{if isset($HomeHook) && $HomeHook=='true'}
<div id="customcontent_home">
  <ul class="customcontent-home">
    {foreach from=$xml->item item=item name=items}
      {if $item->hook == 'home'}
      <li class="num-{$smarty.foreach.items.iteration}">
        {if $item->img && $item->url}
          <a href="{$item->url}">
            <img src="{$img_path}{$item->img}" alt=""/>
          </a>
        {/if}
        {if $item->img && !$item->url}
            <img src="{$img_path}{$item->img}" alt=""/>
        {/if}
        {if $item->html->$html_lang}    
           <a class="item_html " href="{$item->url}">
          {$item->html->$html_lang}
          </a>
        {/if}
      </li>
      {/if}
    {/foreach}
  </ul>
</div>
{/if}