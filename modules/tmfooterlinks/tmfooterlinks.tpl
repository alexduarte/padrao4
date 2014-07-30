<div id="tmfooterlinks">
<div>
		<h4>{l s='Information' mod='tmfooterlinks'}</h4>
		<ul class="first">
			<li><a href="{$link->getPageLink('contact-form.php')}">{l s='Contact' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('sitemap.php')}">{l s='Sitemap' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('cms.php?id_cms=2')}">{l s='Legal Notice' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('cms.php?id_cms=3')}">{l s='Terms and conditions' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('cms.php?id_cms=4')}">{l s='About us' mod='tmfooterlinks'}</a></li>
		</ul>
	</div>
	<div>
		<h4>{l s='Your Account' mod='tmfooterlinks'}</h4>
		<ul>
			<li><a href="{$link->getPageLink('my-account.php')}">{l s='Your Account' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('identity.php')}">{l s='Personal information' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('addresses.php')}">{l s='Addresses' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('discount.php')}">{l s='Discount' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('history.php')}">{l s='Order history' mod='tmfooterlinks'}</a></li>
		</ul>
	</div>
	<div>
		<h4>{l s='Our offers' mod='tmfooterlinks'}</h4>
		<ul>
			<li><a href="{$link->getPageLink('new-products.php')}">{l s='New products' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('best-sales.php')}">{l s='Top sellers' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('prices-drop.php')}">{l s='Specials' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('manufacturer.php')}">{l s='Manufacturers' mod='tmfooterlinks'}</a></li>
			<li><a href="{$link->getPageLink('supplier.php')}">{l s='Suppliers' mod='tmfooterlinks'}</a></li>
		</ul>
	</div>
	<p>&copy; {$smarty.now|date_format:"%Y"} {l s='Powered by' mod='tmfooterlinks'} <a href="http://www.atsinformatica.com.br">ATS Informática</a>&trade;. Todos direitos reservados</p>
</div>