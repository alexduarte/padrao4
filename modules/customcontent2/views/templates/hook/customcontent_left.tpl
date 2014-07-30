{foreach from=$xml->item item=itemPos name=items}
  {if $itemPos->hook == 'left'}{assign var='LeftHook' value='true'}{/if}
{/foreach}
{if isset($LeftHook) && $LeftHook=='true'}
<div id="customcontent_left">
  <ul class="customcontent-left">
    {foreach from=$xml->item item=item name=items}
      {if $item->hook == 'left'}
      <li>
        {if $item->img && $item->url}
          <a href="{$item->url}">
            <img src="{$img_path}{$item->img}" alt=""/>
          </a>
        {/if}
        {if $item->img && !$item->url}
            <img src="{$img_path}{$item->img}" alt=""/>
        {/if}
        {if $item->html->$html_lang}   
        <div class="item_html">
          {$item->html->$html_lang}
        </div>
        {/if}
      </li>
      {/if}
    {/foreach}
  </ul>
</div>
{/if}