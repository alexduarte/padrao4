{capture name=path}{l s='Manufacturers'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}
<h1><span>{l s='Manufacturers'}</span></h1>
{if isset($errors) AND $errors}
	{include file="$tpl_dir./errors.tpl"}
{else}
	<p class="clearfix title_manuf">{strip}
		<span class="title_shop">
			{if $nbManufacturers == 0}{l s='There are no manufacturers.'}
			{else}
				{if $nbManufacturers == 1}
					{l s='There is %d manufacturer.' sprintf=$nbManufacturers}
				{else}
					{l s='There are %d manufacturers.' sprintf=$nbManufacturers}
				{/if}
			{/if}
		</span>{/strip}
	</p>
	{if $nbManufacturers > 0}
		<ul id="manufacturers_list"  class="mnf_sup_list clearfix">
		{foreach from=$manufacturers item=manufacturer name=manufacturers}
			<li class="shop_box clearfix {if $smarty.foreach.manufacturers.first}first_item{elseif $smarty.foreach.manufacturers.last}last_item{else}item{/if}"> 
					<!-- logo -->
					<div class="logo">
					{if $manufacturer.nb_products > 0}<a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$manufacturer.name|escape:'htmlall':'UTF-8'}" class="lnk_img">{/if}
						<img src="{$img_manu_dir}{$manufacturer.id_manufacturer}-brand.jpg" alt="" />
					{if $manufacturer.nb_products > 0}</a>{/if}
					</div>
					<!-- name -->
                    <div class="left_side">
					<h3>
						{if $manufacturer.nb_products > 0}<a class="product_link" href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}">{/if}
						{$manufacturer.name|truncate:60:'...'|escape:'htmlall':'UTF-8'}
						{if $manufacturer.nb_products > 0}</a>{/if}
					</h3>
					<div>
					{if $manufacturer.nb_products > 0}<p class="product_desc">{/if}
						<span>{$manufacturer.description|truncate:150:'...'|escape:'htmlall':'UTF-8'}</span>
                       <em class="des-small"> {$manufacturer.description|truncate:80:'...'|escape:'htmlall':'UTF-8'}</em>
					{if $manufacturer.nb_products > 0}</p>{/if}
                    			</div>
				</div>
				<div class="right_side">
					<p>
					{if $manufacturer.nb_products > 0}<a class="title_shop" href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}">{/if}
						<span>{if $manufacturer.nb_products == 1}{l s='%d product' sprintf=$manufacturer.nb_products|intval}{else}{l s='%d products' sprintf=$manufacturer.nb_products|intval}{/if}</span>
					{if $manufacturer.nb_products > 0}</a>{/if}
					</p>
				{if $manufacturer.nb_products > 0}
					<a class="button" href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}">{l s='view products'}</a>
				{/if}
                </div>
			</li>
		{/foreach}
		</ul>
		{include file="$tpl_dir./pagination.tpl"}
	{/if}
{/if}