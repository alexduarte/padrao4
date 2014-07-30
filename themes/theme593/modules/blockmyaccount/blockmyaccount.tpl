<!-- Block myaccount module -->
<section  class="block myaccount column_box">
	<h4><span>{l s='My account' mod='blockmyaccount'}</span><span class="column_icon_toggle"></span></h4>
	<div class="block_content toggle_content">
		<ul class="store_list">
			<li><a href="{$link->getPageLink('history', true)}" title="">{l s='My orders' mod='blockmyaccount'}</a></li>
			{if $returnAllowed}<li><a href="{$link->getPageLink('order-follow', true)}" title="">{l s='My merchandise returns' mod='blockmyaccount'}</a></li>{/if}
			<li><a href="{$link->getPageLink('order-slip', true)}" title="">{l s='My credit slips' mod='blockmyaccount'}</a></li>
			<li><a href="{$link->getPageLink('addresses', true)}" title="">{l s='My addresses' mod='blockmyaccount'}</a></li>
			<li><a href="{$link->getPageLink('identity', true)}" title="">{l s='My personal info' mod='blockmyaccount'}</a></li>
			{if $voucherAllowed}<li><a href="{$link->getPageLink('discount', true)}" title="">{l s='My vouchers' mod='blockmyaccount'}</a></li>{/if}
			{$HOOK_BLOCK_MY_ACCOUNT}
		</ul>
		<p class="logout"><a class="button" href="{$link->getPageLink('index', true, NULL, "mylogout")}" title="{l s='Sign out' mod='blockmyaccount'}">{l s='Sign out' mod='blockmyaccount'}</a></p>
	</div>
</section>
<!-- /Block myaccount module -->
