<!-- Block RSS module-->
<section id="rss_block_left"  class="block column_box">
	<h4><span>{$title}</span><span class="column_icon_toggle"></span></h4>
	<div class="block_content toggle_content">
		{if $rss_links}
			<ul class="store_list">
				{foreach from=$rss_links item='rss_link'}
					<li><a href="{$rss_link.url}">{$rss_link.title}</a></li>
				{/foreach}
			</ul>
		{else}
			<p>{l s='No RSS feed added' mod='blockrss'}</p>
		{/if}
	</div>
</section>
<!-- /Block RSS module-->
