{if $page_name == 'index'}
<!-- tmspecials -->
<div id="tmspecials" class="home_block">
	<h4>{l s='Special' mod='tmspecials'}</h4>
	<div class="block_content">
		<ul>
		{foreach from=$specials item=special name=specials}
		{if $smarty.foreach.specials.iteration<=5}
			<li>
				<a class="product_image" href="{$special.link}"><img src="{$link->getImageLink($special.link_rewrite, $special.id_image, 'home')}" alt="{$special.legend|escape:html:'UTF-8'}" title="{$special.name|escape:html:'UTF-8'}" /></a>
				<div>
					<h5><a class="product_link" href="{$special.link}" title="{$special.name|escape:html:'UTF-8'}">{$special.name|escape:html:'UTF-8'|truncate:20:'...'}</a></h5>
					<!--<p class="product_desc">{$special.description_short|truncate:50:'...'|strip_tags:'UTF-8'}</p>-->
					<div class="price-wrapper">
						<span class="price">{if !$priceDisplay}{displayWtPrice p=$special.price}{else}{displayWtPrice p=$special.price_tax_exc}{/if}</span>
						<span class="price-discount">{displayWtPrice p=$special.price_without_reduction}</span>
					</div>
					<!--<a class="button" href="{$special.link}" title="{l s='View' mod='tmspecials'}">{l s='View' mod='tmspecials'}</a>-->
				</div>
			</li>
		{/if}
		{/foreach}
		</ul>
	</div>
	<div class="clearblock"></div>
</div>
<!-- /tmspecials -->
{/if}