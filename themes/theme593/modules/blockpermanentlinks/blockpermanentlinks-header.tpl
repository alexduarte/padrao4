<!-- Block permanent links module HEADER -->
<section class="header-box blockpermanentlinks-header">
    <ul id="header_links">
        <li><a href="{$link->getPageLink('index.php')}" class="header_links_home">{l s='home' mod='blockpermanentlinks'}</a></li>
        <li><a  href="{$link->getPageLink('stores')}" class="header_links_store">{l s='Our stores'}</a></li>
        <li ><a href="{$link->getCMSLink('4', 'About Us')}" class="header_links_about">{l s='About Us'}</a></li>
        <li ><a href="{$link->getCMSLink('1', 'Delivery')}" class="header_links_delivery">{l s='Delivery'}</a></li>
        <li><a href="{$link->getPageLink('contact', true)}" class="header_links_contact"  title="{l s='Contact us' mod='blockpermanentlinks'}">{l s='Contact us' mod='blockpermanentlinks'}</a></li>

        
    </ul>

    <div class="mobile-link-top">
        <h4>
             <span class="title-hed"></span><span class="arrow_header_top_menu"></span>
        </h4>
        <ul id="mobilelink" class="list_header">
            <li><a href="{$link->getPageLink('index.php')}" class="header_links_home">{l s='home' mod='blockpermanentlinks'}</a></li>
        <li><a  href="{$link->getPageLink('stores')}" class="header_links_store">{l s='Our stores'}</a></li>
               <li ><a href="{$link->getCMSLink('4', 'About Us')}" class="header_links_about">{l s='About Us'}</a></li>
    	    <li ><a href="{$link->getCMSLink('1', 'Delivery')}" class="header_links_delivery">Delivery</a></li>
        <li><a href="{$link->getPageLink('contact', true)}" class="header_links_contact"  title="{l s='Contact us' mod='blockpermanentlinks'}">{l s='Contact us' mod='blockpermanentlinks'}</a></li>

        </ul>
    </div>
</section>
<!-- /Block permanent links module HEADER -->


