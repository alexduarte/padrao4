<!-- Block categories module -->
<section  id="categories_block_left"  class="column_box block">
	<h4><span>{l s='Categories' mod='blockcategories'}</span><span class="column_icon_toggle"></span></h4>
		<ul class="toggle_content tree {if $isDhtml}dhtml{/if} store_list">
		{foreach from=$blockCategTree.children item=child name=blockCategTree}
			{if $smarty.foreach.blockCategTree.last}
				{include file="$branche_tpl_path" node=$child last='true'}
			{else}
				{include file="$branche_tpl_path" node=$child}
			{/if}
		{/foreach}
		</ul>
		{* Javascript moved here to fix bug #PSCFI-151 *}
		<script type="text/javascript">
		// <![CDATA[
			// we hide the tree only if JavaScript is activated
			$('div#categories_block_left ul.dhtml').hide();
		// ]]>
		</script>
</section>
<!-- /Block categories module -->
