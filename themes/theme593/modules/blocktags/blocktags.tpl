<!-- Block tags module -->
<section id="tags_block_left" class="block tags_block column_box">
	<h4><span>{l s='Tags' mod='blocktags'}</span><span class="column_icon_toggle"></span></h4>
        <p class="block_content toggle_content">
            {if $tags}
                {foreach from=$tags item=tag name=myLoop}
                    <a href="{$link->getPageLink('search', true, NULL, "tag={$tag.name|urlencode}")}" title="{l s='More about' mod='blocktags'} {$tag.name|escape:html:'UTF-8'}" class="{$tag.class} {if $smarty.foreach.myLoop.last}last_item{elseif $smarty.foreach.myLoop.first}first_item{else}item{/if}"><i class="icon-tags"></i>{$tag.name|escape:html:'UTF-8'}</a>
                {/foreach}
            {else}
                {l s='No tags specified yet' mod='blocktags'}
            {/if}
        </p>
</section>
<!-- /Block tags module -->
