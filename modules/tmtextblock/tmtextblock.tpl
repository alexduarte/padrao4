{if $page_name == 'index'}
<div id="tmtextblock">
{foreach from=$xml->link item=home_link name=links}
	<span class="txt2">{$home_link->field1}</span>
	<span class="txt1">{$home_link->field2}</span>
{/foreach}
</div>
{/if}