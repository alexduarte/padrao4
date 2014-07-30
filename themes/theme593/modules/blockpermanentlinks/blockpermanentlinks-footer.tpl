<!-- Block permanent links module -->
<section id="permanent_links" class="block">
<h4>{l s='Link' mod='blockpermanentlinks'}</h4>
    <ul class="list-footer toggle_content">
        <li class="sitemap">
            <a href="{$link->getPageLink('sitemap')}">{l s='sitemap' mod='blockpermanentlinks'}</a>
        </li>
        <li class="contact">
            <a href="{$link->getPageLink('contact', true)}">{l s='contact' mod='blockpermanentlinks'}</a>
        </li>
        <li class="add_bookmark">
           <script type="text/javascript">writeBookmarkLink('{$come_from}', '{$meta_title|addslashes|addslashes}', '{l s='bookmark' mod='blockpermanentlinks' js=1}');</script>
        </li>
    </ul>
</section>
<!-- /Block permanent links module -->
