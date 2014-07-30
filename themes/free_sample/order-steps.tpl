{* Assign a value to 'current_step' to display current style *}
{if !$opc}
<ul id="order_steps" class="{if $current_step=='summary'}step1{elseif $current_step=='login'}step2{elseif $current_step=='address'}step3{elseif $current_step=='shipping'}step4{elseif $current_step=='payment'}step5{/if}">
	<li class="{if $current_step=='summary'}step_current{else}{if $current_step=='payment' || $current_step=='shipping' || $current_step=='address' || $current_step=='login'}step_done{else}step_todo{/if}{/if}">
		{if $current_step=='payment' || $current_step=='shipping' || $current_step=='address' || $current_step=='login'}
		<a href="{$link->getPageLink('order.php', true)}{if isset($back) && $back}?back={$back}{/if}">{l s='Summary'}</a>
		{else}<span>{l s='Summary'}</span>
		{/if}
	</li>
	<li class="{if $current_step=='login'}step_current{else}{if $current_step=='payment' || $current_step=='shipping' || $current_step=='address'}step_done{else}step_todo{/if}{/if}">
		{if $current_step=='payment' || $current_step=='shipping' || $current_step=='address'}
		<a href="{$link->getPageLink('order.php', true)}?step=1{if isset($back) && $back}&amp;back={$back}{/if}">{l s='Login'}</a>
		{else}<span>{l s='Login'}</span>
		{/if}
	</li>
	<li class="{if $current_step=='address'}step_current{else}{if $current_step=='payment' || $current_step=='shipping'}step_done{else}step_todo{/if}{/if}">
		{if $current_step=='payment' || $current_step=='shipping'}
		<a href="{$link->getPageLink('order.php', true)}?step=1{if isset($back) && $back}&amp;back={$back}{/if}">{l s='Address'}</a>
		{else}<span>{l s='Address'}</span>
		{/if}
	</li>
	<li class="{if $current_step=='shipping'}step_current{else}{if $current_step=='payment'}step_done{else}step_todo{/if}{/if}">
		{if $current_step=='payment'}</span>
		<a href="{$link->getPageLink('order.php', true)}?step=2{if isset($back) && $back}&amp;back={$back}{/if}">{l s='Shipping'}</a>
		{else}<span>{l s='Shipping'}</span>
		{/if}
	</li>
	<li id="step_end" class="{if $current_step=='payment'}step_current{else}step_todo{/if}">
		<span>{l s='Payment'}</span>
	</li>
</ul>
{/if}


<span>
</span>