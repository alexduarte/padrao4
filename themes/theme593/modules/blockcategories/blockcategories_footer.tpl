<!-- Block categories module -->
<section class="block block_category_footer">
        <h4>{l s='Categories' mod='blockcategories'}</h4>
		<ul class="toggle_content list-footer tree {if $isDhtml}dhtml{/if}">
		{foreach from=$blockCategTree.children item=child name=blockCategTree}
			{if $smarty.foreach.blockCategTree.last}
				{include file="$branche_tpl_path" node=$child last='true'}
			{else}
				{include file="$branche_tpl_path" node=$child}
			{/if}
			{if ($smarty.foreach.blockCategTree.iteration mod $numberColumn) == 0 AND !$smarty.foreach.blockCategTree.last}
		</ul>
	<ul class="list-footer tree {if $isDhtml}dhtml{/if}">
			{/if}
			{/foreach}
		</ul>
</section>
<!-- /Block categories module -->
