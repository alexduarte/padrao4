<!-- MODULE Block best sellers -->
<section id="blockbestsellers" class="block products_block column_box">
	<h4><span>{l s='Top sellers' mod='blockbestsellers'}</span><span class="column_icon_toggle"></span></h4>
	<div class="block_content toggle_content">
	{if $best_sellers|@count > 0}
	<ul>
		{foreach from=$best_sellers item=product name=myLoop}
		{if $smarty.foreach.myLoop.iteration <= 3}
		<li class="clearfix shop_box">
			{if $smarty.foreach.myLoop.iteration <= 3}
			<a class="products_block_img" href="{$product.link}" title="{$product.legend|escape:html:'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')}" alt="{$product.legend|escape:html:'UTF-8'}" /></a>
			<div>
			{/if}
				<h5><a class="product_link" href="{$product.link}" title="{$product.name|escape:html:'UTF-8'}">{$product.name|strip_tags|escape:html:'UTF-8'|truncate:35:'...'}</a></h5>
			{if $smarty.foreach.myLoop.iteration <= 3}
			<p class="product_descr">{$product.description_short|strip_tags|escape:html:'UTF-8'|truncate:75:'...'}</p>
			</div>
			{/if}
		</li>
		{/if}
		{/foreach}
	</ul>
	<a href="{$link->getPageLink('best-sales')}" title="{l s='All best sellers' mod='blockbestsellers'}" class="button_large">{l s='All best sellers' mod='blockbestsellers'}</a>
	{else}
		<p>{l s='No best sellers at this time' mod='blockbestsellers'}</p>
	{/if}
	</div>
</section>