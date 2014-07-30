{capture name=path}{l s='Manufacturers'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}
<h1>{l s='Manufacturers'}</h1>
{if isset($errors) AND $errors}
	{include file="$tpl_dir./errors.tpl"}
{else}
	<p>{strip}
		<span class="bold">
			{if $nbManufacturers == 0}{l s='There are no manufacturers.'}
			{else}
				{if $nbManufacturers == 1}{l s='There is'}{else}{l s='There are'}{/if}&#160;
				{$nbManufacturers}&#160;
				{if $nbManufacturers == 1}{l s='manufacturer.'}{else}{l s='manufacturers.'}{/if}
			{/if}
		</span>{/strip}
	</p>
	{if $nbManufacturers > 0}
		<ul id="manufacturers_list" class="mnf_sup_list bordercolor">
		{foreach from=$manufacturers item=manufacturer name=manufacturers}
			<li class="bordercolor"> 
				<div class="logo bordercolor">
					{if $manufacturer.nb_products > 0}<a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$manufacturer.name|escape:'htmlall':'UTF-8'}">{/if}
					<img src="{$img_manu_dir}{$manufacturer.image|escape:'htmlall':'UTF-8'}-medium.jpg" alt="" width="{$mediumSize.width}" height="{$mediumSize.height}" />
					{if $manufacturer.nb_products > 0}</a>{/if}
				</div>
				<div class="left_side">
					<h3>
						{if $manufacturer.nb_products > 0}<a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}">{/if}
						{$manufacturer.name|truncate:60:'...'|escape:'htmlall':'UTF-8'}
						{if $manufacturer.nb_products > 0}</a>{/if}
					</h3>
					<div>
						{if $manufacturer.nb_products > 0}<a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}">{/if}
						{$manufacturer.description|strip_tags|truncate:100:'...'}
						{if $manufacturer.nb_products > 0}</a>{/if}
					</div>
				</div>
				<div class="right_side bordercolor">
					<p>
						{if $manufacturer.nb_products > 0}<a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}">{/if}
						<span>{$manufacturer.nb_products|intval}</span> {if $manufacturer.nb_products == 1}{l s='product'}{else}{l s='products'}{/if}
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