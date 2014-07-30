<!-- Block permanent links module -->
<section id="permanent_links" class="block column_box">
<h4><span>{l s='Link' mod='blockpermanentlinks'}</span><span class="column_icon_toggle"></span></h4>
<ul class="store_list toggle_content">
	<li class="sitemap"><a href="{$link->getPageLink('sitemap')}">{l s='sitemap' mod='blockpermanentlinks'}</a></li>
	<li class="contact"><a href="{$link->getPageLink('contact', true)}">{l s='contact' mod='blockpermanentlinks'}</a></li>
	<li class="add_bookmark"><script type="text/javascript">writeBookmarkLink('{$come_from}', '{$meta_title|addslashes|addslashes}', '{l s='bookmark' mod='blockpermanentlinks' js=1}');</script></li>
</ul>
</section>
<!-- /Block permanent links module -->