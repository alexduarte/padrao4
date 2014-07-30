<!-- Block myaccount module -->
<section class="block blockmyaccountfooter span4">
	<h4>{l s='My account' mod='blockmyaccountfooter'}</h4>
		<ul class="list-footer toggle_content clearfix">
			<li><a href="{$link->getPageLink('history', true)}" title="{l s='List of my orders' mod='blockmyaccountfooter'}" rel="nofollow">{l s='My orders' mod='blockmyaccountfooter'}</a></li>
			{if $returnAllowed}<li><a href="{$link->getPageLink('order-follow', true)}" title="{l s='List of my merchandise returns' mod='blockmyaccountfooter'}" rel="nofollow">{l s='My merchandise returns' mod='blockmyaccountfooter'}</a></li>{/if}
			<li><a href="{$link->getPageLink('order-slip', true)}" title="{l s='List of my credit slips' mod='blockmyaccountfooter'}" rel="nofollow">{l s='My credit slips' mod='blockmyaccountfooter'}</a></li>
			<li><a href="{$link->getPageLink('addresses', true)}" title="{l s='List of my addresses' mod='blockmyaccountfooter'}" rel="nofollow">{l s='My addresses' mod='blockmyaccountfooter'}</a></li>
			<li><a href="{$link->getPageLink('identity', true)}" title="{l s='Manage my personal information' mod='blockmyaccountfooter'}" rel="nofollow">{l s='My personal info' mod='blockmyaccountfooter'}</a></li>
			{if $voucherAllowed}<li><a href="{$link->getPageLink('discount', true)}" title="{l s='List of my vouchers' mod='blockmyaccountfooter'}" rel="nofollow">{l s='My vouchers' mod='blockmyaccountfooter'}</a></li>{/if}
			{$HOOK_BLOCK_MY_ACCOUNT}
		</ul>    		
</section>
<!-- /Block myaccount module -->
