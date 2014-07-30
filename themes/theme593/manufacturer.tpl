
{include file="$tpl_dir./breadcrumb.tpl"}

{include file="$tpl_dir./errors.tpl"}

{if !isset($errors) OR !sizeof($errors)}
	<h1><span>{l s='List of products by manufacturer'}&nbsp;{$manufacturer->name|escape:'htmlall':'UTF-8'}</span></h1>
	{if !empty($manufacturer->description) || !empty($manufacturer->short_description)}
		<div class="description_box cat_desc">
			{if !empty($manufacturer->short_description)}
				{*<p class="">{$manufacturer->short_description}</p>*}
				<p>{$manufacturer->description}</p>
			{*	<a href="#" class="lnk_more" onclick="$(this).prev().slideDown('slow'); $(this).hide(); return false;">{l s='More'}</a>*}
			{else}
				<p>{$manufacturer->description}</p>
			{/if}
		</div>
	{/if}
	{if $products}
            <div class="sortPagiBar shop_box_row shop_box_row clearfix">
            {include file="./product-sort.tpl"}
            {include file="./nbr-product-page.tpl"}
            </div>
		{include file="./product-list.tpl" products=$products}
	            <div class="bottom_pagination shop_box_row  clearfix">
            {include file="./product-compare.tpl"}
            {include file="./pagination.tpl"}
            </div>
	{else}
		<p class="warning">{l s='No products for this manufacturer.'}</p>
	{/if}
{/if}
