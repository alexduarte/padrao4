{foreach from=$xml->item item=itemPos name=items}
  {if $itemPos->hook == 'footer'}{assign var='FooterHook' value='true'}{/if}
{/foreach}
{if isset($FooterHook) && $FooterHook=='true'}
</div>
</div>
<div id="customcontent_footer">
  <ul class="customcontent-footer">
    {foreach from=$xml->item item=item name=items}
      {if $item->hook == 'footer'}
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
<div>
<div>
{/if}