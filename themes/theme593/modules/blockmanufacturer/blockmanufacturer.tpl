<!-- Block manufacturers module -->
<section id="manufacturers_block_left" class="block blockmanufacturer column_box">
	<h4 class="title_block">{if $display_link_manufacturer}<span>{/if}{l s='Manufacturers' mod='blockmanufacturer'}{if $display_link_manufacturer}</span>{/if}<span class="column_icon_toggle"></span></h4>
	<div class="block_content toggle_content">
{if $manufacturers}
	{if $text_list}
	<ul class="store_list">
	{foreach from=$manufacturers item=manufacturer name=manufacturer_list}
		{if $smarty.foreach.manufacturer_list.iteration <= $text_list_nb}
		<li class="{if $smarty.foreach.manufacturer_list.last}last_item{elseif $smarty.foreach.manufacturer_list.first}first_item{else}item{/if}"><a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)}" title="{l s='More about' mod='blockmanufacturer'} {$manufacturer.name}"><i class="icon-ok"></i>{$manufacturer.name|escape:'htmlall':'UTF-8'}</a></li>
		{/if}
	{/foreach}
	</ul>
	{/if}
	{if $form_list}
		<form action="{$smarty.server.SCRIPT_NAME|escape:'htmlall':'UTF-8'}" method="get">
			<p>
				<select id="manufacturer_list" onchange="autoUrl('manufacturer_list', '');">
					<option value="0">{l s='All manufacturers' mod='blockmanufacturer'}</option>
				{foreach from=$manufacturers item=manufacturer}
					<option value="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)}">{$manufacturer.name|escape:'htmlall':'UTF-8'}</option>
				{/foreach}
				</select>
			</p>
		</form>
	{/if}
{else}
	<p>{l s='No manufacturer' mod='blockmanufacturer'}</p>
{/if}
	</div>
</section>
<!-- /Block manufacturers module -->
