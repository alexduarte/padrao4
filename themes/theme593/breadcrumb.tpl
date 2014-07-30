<!-- Breadcrumb -->
{if isset($smarty.capture.path)}{assign var='path' value=$smarty.capture.path}{/if}
<div class="breadcrumb">
<div class="breadcrumb_inset">
	<a class="breadcrumb-home" href="{$base_dir}" title="{l s='return to Home'}" rel="tooltip"><i class="icon-home"></i></a>
	{if isset($path) AND $path}
		<span class="navigation-pipe" {if isset($category) && isset($category->id_category) && $category->id_category == 1}style="display:none;"{/if}>{$navigationPipe|escape:html:'UTF-8'}</span>
		{if !$path|strpos:'span'}
			<span class="navigation_page">{$path}</span>
		{else}
			{$path}
		{/if}
	{/if}
</div>
</div>
<!-- /Breadcrumb -->