<!-- MODULE TM best sellers -->
<div id="tmbestsellers" class="block">
	<h4>{l s='Top sellers' mod='tmbestsellers'}</h4>
	<div class="block_content">
	{if $best_sellers|@count > 0}
		<ul>
			{foreach from=$best_sellers item=product name=myLoop}
			{if $smarty.foreach.myLoop.iteration <= 10}
			<li>
				<!--  <a href="{$product.link}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home')}" alt="{$product.name|escape:html:'UTF-8'}" /></a> -->
				<a href="{$product.link}" title="{$product.name|escape:'htmlall':'UTF-8'}"><span>{if $smarty.foreach.myLoop.iteration <= 9}0{/if}{$smarty.foreach.myLoop.iteration}. </span>{$product.name|escape:'htmlall':'UTF-8'|truncate:20:'...'}</a>
			</li>
			{/if}
			{/foreach}
		</ul>
		<div class="clearblock"></div>
	{else}
		<p>{l s='No best sellers at this time' mod='tmbestsellers'}</p>
	{/if}
	</div>
</div>
<!-- /MODULE TM best sellers -->