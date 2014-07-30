{if count($categoryProducts) > 0 && $categoryProducts !== false}
	<section class="page_product_box blockproductscategory">
		<h3>{$categoryProducts|@count} {l s='other products in the same category:' mod='productscategory'}<span class="icon-toggle"></span></h3>
    	<div id="block-category-slider" class="carusel-inner responsive  toggle_content">
        	<ul id="carouselproduct" class="carousel-ul">
			{foreach from=$categoryProducts item='categoryProduct' name=categoryProduct}
                <li class="item">
                    <a href="{$link->getProductLink($categoryProduct.id_product, $categoryProduct.link_rewrite, $categoryProduct.category, $categoryProduct.ean13)}" class="lnk_img" title="{$categoryProduct.name|htmlspecialchars}"><img src="{$link->getImageLink($categoryProduct.link_rewrite, $categoryProduct.id_image, 'medium_default')}" alt="{$categoryProduct.name|htmlspecialchars}" /></a>
                        <a class="product_link" href="{$link->getProductLink($categoryProduct.id_product, $categoryProduct.link_rewrite, $categoryProduct.category, $categoryProduct.ean13)}" title="{$categoryProduct.name|htmlspecialchars}">{$categoryProduct.name|truncate:15:'...'|escape:'htmlall':'UTF-8'}</a>
                    {if $ProdDisplayPrice AND $categoryProduct.show_price == 1 AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
                    <p class="price_display">
                        <span class="price">{convertPrice price=$categoryProduct.displayed_price}</span>
                    </p>
                    {/if}
                </li>
			{/foreach}
        	</ul>

            	<a class="prev" id="cat_prev" href="#"></a>
				<a class="next" id="cat_next" href="#"></a>
            </div>
</section>
<script type="text/javascript">
	$("#carouselproduct").carouFredSel({
		debug: true,
		circular: true,
        infinite: true,
		responsive: true,
		align   : "center",
		width: '100%',
	    auto	: {
    		play	: 1,
	    	timeoutDuration :15000
	    },
		
	    items	: {
					
		visible: {
					min: 2,
					max: 6
					 },
					 width:167,
		
		},		
		scroll	: {
			items	: 1,
			pauseOnHover:false
		},
		prev	: {
			button	: "#cat_prev"
		},
		next	: {
			button	: "#cat_next"
		},
		swipe: {
					onMouse: true,
					onTouch: true
			   }
	}, 
	{
	    classnames		: {
		    selected		: "selected",
		    hidden			: "hidden",
		    disabled		: "disabled",
		    paused			: "paused",
		    stopped			: "stopped"
	    },

	});
	</script>
{/if}
