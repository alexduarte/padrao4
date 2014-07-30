<!-- MODULE Block new products -->
<section id="new-products_block_right" class="block products_block column_box">
	<h4 class="title_block"><span>{l s='New products' mod='blocknewproducts'}</span> <span class="column_icon_toggle"></span></h4>
	<div class="block_content toggle_content">
	{if $new_products !== false}
		<ul class="products">
		{foreach from=$new_products item=newproduct name=myLoop}
        	<li class="shop_box clearfix {if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
     
                	<a class="products_block_img" href="{$newproduct.link}" title="{$newproduct.legend|escape:html:'UTF-8'}"><img src="{$link->getImageLink($newproduct.link_rewrite, $newproduct.id_image, 'medium_default')}" alt="{$newproduct.legend|escape:html:'UTF-8'}" /></a>
         
                <div >
            	<h5 class="s_title_block">
					<a class="product_link" href="{$newproduct.link}" title="{$newproduct.name|escape:html:'UTF-8'}">{$newproduct.name|strip_tags:'UTF-8'|truncate:22:'...'}</a>
            	</h5>
				{if $newproduct.description_short}
            		<p class="product_desc">{$newproduct.description_short|strip_tags:'UTF-8'|truncate:60:'...'}</p>
                    <a href="{$newproduct.link}" class="lnk_more">{l s='Read more' mod='blocknewproducts'}</a>
            	{/if}
                </div>
            </li>
		{/foreach}
		</ul>
		<a href="{$link->getPageLink('new-products')}" title="{l s='All new products' mod='blocknewproducts'}" class="button_large">{l s='All new products' mod='blocknewproducts'}</a>
	{else}
		<p>&raquo; {l s='No new products at this time' mod='blocknewproducts'}</p>
	{/if}
	</div>
</section>
<!-- /MODULE Block new products -->