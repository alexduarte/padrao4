<!-- Block Viewed products -->
<section id="viewed-products_block_left" class="block products_block column_box">
	<h4><span>{l s='Viewed products' mod='blockviewed'}</span><span class="column_icon_toggle"></span></h4>
	<div class="block_content toggle_content">
		<ul class="products ">
			{foreach from=$productsViewedObj item=viewedProduct name=myLoop}
				<li class="shop_box  clearfix">
					<a class="products_block_img bordercolor" href="{$viewedProduct->product_link}" title="{l s='More about' mod='blockviewed'} {$viewedProduct->name|escape:html:'UTF-8'}"><img src="{$link->getImageLink($viewedProduct->link_rewrite, $viewedProduct->cover, 'small_default')}" alt="{$viewedProduct->legend|escape:html:'UTF-8'}" /></a>
					<div>
	<h5><a class="product_link" href="{$viewedProduct->product_link}" title="{l s='More about' mod='blockviewed'} {$viewedProduct->name|escape:html:'UTF-8'}">{$viewedProduct->name|truncate:25:'...'|escape:html:'UTF-8'}</a></h5>
	<p class="product_descr">{$viewedProduct->description_short|strip_tags:'UTF-8'|truncate:75}</p>
     </div> 
				</li>
			{/foreach}
		</ul>
	</div>
</section>
