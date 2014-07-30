<!-- Block links module -->
<section id="links_block_left" class="block column_box">
	<h4>
    <span>
	{if $url}
		<a href="{$url|escape}">{$title|escape}</a>
	{else}
		{$title|escape}
	{/if}
    </span>
    <span class="column_icon_toggle"></span>
	</h4>
	<ul class="block_content store_list toggle_content">
	{foreach from=$blocklink_links item=blocklink_link}
		{if isset($blocklink_link.$lang)} 
			<li><a href="{$blocklink_link.url|escape}"{if $blocklink_link.newWindow} onclick="window.open(this.href);return false;"{/if}><i class="icon-ok"></i>{$blocklink_link.$lang|escape}</a></li>
		{/if}
	{/foreach}
	</ul>
</section>
<!-- /Block links module -->
