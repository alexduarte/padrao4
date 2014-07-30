<li class="{if $node.children|@count > 0}sub{/if}{if isset($last) && $last == 'true'} last{/if}">
	<a href="{$node.link}" {if isset($currentCategoryId) && ($node.id == $currentCategoryId)}class="selected"{/if}>{$node.name|escape:html:'UTF-8'}</a>
	{if $node.children|@count > 0}
		<ul class="subcat">
		{foreach from=$node.children item=child name=categoryTreeBranch}
			{if isset($smarty.foreach.categoryTreeBranch) && $smarty.foreach.categoryTreeBranch.last}
				{include file="$branche_tpl_path" node=$child last='true'}
			{else}
				{include file="$branche_tpl_path" node=$child last='false'}
			{/if}
		{/foreach}
		</ul>
	{/if}
</li>