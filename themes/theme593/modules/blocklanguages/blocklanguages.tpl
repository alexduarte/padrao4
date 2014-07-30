<!-- Block languages module -->
{if count($languages) > 1}
<section id="languages_block_top" class="header-box">
	<div id="countries_2">
        {foreach from=$languages key=k item=language name="languages"}
            {if $language.iso_code == $lang_iso}
                <p class="selected_language">
                  {$language.iso_code}
                  <span class="arrow_header_top"></span>
                </p>
            {/if}
        {/foreach}
            <ul id="first-languages" class="countries_ul list_header">
            {foreach from=$languages key=k item=language name="languages"}
                <li {if $language.iso_code == $lang_iso}class="selected"{/if}>
			{if $language.iso_code != $lang_iso}
				{assign var=indice_lang value=$language.id_lang}
				{if isset($lang_rewrite_urls.$indice_lang)}
					<a href="{$lang_rewrite_urls.$indice_lang|escape:htmlall}" title="{$language.name}">
				{else}
					<a href="{$link->getLanguageLink($language.id_lang)|escape:htmlall}" title="{$language.name}">

				{/if}
			{/if}
			<img src="{$img_lang_dir}{$language.id_lang}.jpg" alt="{$language.iso_code}" width="26" height="16" /><span>{$language.name}</span>
            {if $language.iso_code != $lang_iso}
				</a>
			{/if}
                </li>
            {/foreach}
            </ul>
	</div>
</section>
<script type="text/javascript">
$(document).ready(function(){
$('#countries_2 .countries_ul li span').each(function() {
	var h = $(this).html();
	var index = h.indexOf(' ');
		if(index == -1) {
			index = h.length;
		}
	$(this).html('<span class="firstWord">'+ h.substring(index, h.length) + '</span>' + h.substring(0, index));
});
}); 
</script>
{/if}
<!-- /Block languages module -->
