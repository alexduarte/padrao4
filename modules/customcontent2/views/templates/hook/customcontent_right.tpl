{foreach from=$xml->item item=itemPos name=items}
  {if $itemPos->hook == 'right'}{assign var='RightHook' value='true'}{/if}
{/foreach}
{if isset($RightHook) && $RightHook=='true'}
<div id="customcontent_right">
  <ul class="customcontent-right">
    {foreach from=$xml->item item=item name=items}
      {if $item->hook == 'right'}
      <li>
        {if $item->img && $item->url}
          <a href="{$item->url}">
            <img src="{$img_path}{$item->img}" alt=""/>
          </a>
        {/if}
        {if $item->img && !$item->url}
            <img src="{$img_path}{$item->img}" alt=""/>
        {/if}       
        <div class="item_html">
          {$item->html->$html_lang}
        </div>
      </li>
      {/if}
    {/foreach}
  </ul>
</div>
{/if}