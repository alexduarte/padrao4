<div class="clearfix"></div>
<!-- MODULE Home Featured Products -->
<section class="addhomefeatured">
  <h4><span>{l s='Featured products' mod='addhomefeatured'}</span></h4> 
  	{if isset($products) AND $products}
         <ul class="row">
          {foreach from=$products item=product name=homeFeaturedProducts}
          <li class="ajax_block_product span3  {if $smarty.foreach.homeFeaturedProducts.iteration is div by 4} omega{/if} num-{$smarty.foreach.homeFeaturedProducts.iteration}{if $smarty.foreach.homeFeaturedProducts.iteration == 1 or $smarty.foreach.homeFeaturedProducts.iteration == 5 or $smarty.foreach.homeFeaturedProducts.iteration == 9} alpha{/if}">
                <div class="featured_li"> 
                    <a class="product_image" href="{$product.link}" title="{if $product.price_without_reduction != $product.price}{l s='Sale!' mod='addhomefeatured'}  {l s='and' mod='addhomefeatured'}  {/if}{if isset($product.new) && $product.new == 1}  {l s='New!' mod='addhomefeatured'}{/if}" rel="tooltip" data-placement="bottom" data-original-title="{$product.name|truncate:45:'...'|escape:'htmlall':'UTF-8'}" > 
                              <img  src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')}" alt="{$product.name|escape:html:'UTF-8'}" class="main-img"/> 
                        {foreach from=$addimages key=k item=v}
                           {if $k==$product.id_product && $v !=''}
                           		<img src="{$link->getImageLink($product.link_rewrite,$product.id_product|cat:"-"|cat:$v, 'home_default')}"  alt="{$product.legend|escape:htmlall:'UTF-8'}" style="display:none;"  class="next-img" />
                            {/if}
                        {/foreach} 
                    </a> 
                    <div>
                        <h5><a class="product_link" href="{$product.link}" title="">{$product.name|truncate:45:'...'|escape:'htmlall':'UTF-8'}</a></h5>
                            <p class="product_desc">{$product.description_short|strip_tags|truncate:65:'...'}</p>                 
                                <div class="clearfix">
                                {if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
                                    <span class="price">
                                    {if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
                                    </span>
                                {/if}      
         {if $product.price_without_reduction != $product.price}<span class="price-drop-feacherd">{convertPrice price=$product.price_without_reduction}</span>{/if}
         </div>
                   {if ($product.id_product_attribute == 0 OR (isset($add_prod_display) AND ($add_prod_display == 1))) AND $product.available_for_order AND !isset($restricted_country_mode) 
                    AND $product.minimal_quantity == 1 AND $product.customizable != 2 AND !$PS_CATALOG_MODE}
                    {if ($product.quantity > 0 OR $product.allow_oosp)} 
                        <a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_{$product.id_product}" href="{$link->getPageLink('cart.php')}?qty=1&amp;id_product={$product.id_product}&amp;token={$static_token}&amp;add">
                        <span>{l s='Add to cart' mod='addhomefeatured'}</span>
                        </a> 
                    {else} 
                      <span class="exclusive">{l s='Add to cart' mod='addhomefeatured'}</span> {/if}
                    {/if} 
                        <a class="button" href="{$product.link}"  rel="tooltip" data-placement="bottom">{l s='View' mod='addhomefeatured'}</a>  
                      
                    </div>
                </div>
          </li>
          {/foreach}
        </ul>
  {else}
 	 <p>{l s='No featured products' mod='addhomefeatured'}</p>
  {/if} 
</section>
 <script>
 	$(document).ready(function() {
$(this).find(".addhomefeatured ul li .main-img").mouseover(function () { 
   $(this).next(".addhomefeatured ul li .next-img").stop(true, true).fadeIn(600, 'linear'); 
  });  
  $(".addhomefeatured ul li .next-img").mouseleave(function () { 
      $(".addhomefeatured ul li .next-img").stop(true, true).fadeOut(600, 'linear');
  });
});
 </script>
<!-- /MODULE Home Featured Products -->