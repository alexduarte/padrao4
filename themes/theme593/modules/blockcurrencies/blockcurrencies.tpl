<!-- Block currencies module -->
<section id="currencies_block_top" class="header-box">
<form id="setCurrency" action="{$request_uri}" method="post">
		{*<label>	{l s='Currency' mod='blockcurrencies'}</label>*}
		<p  class="inner-carrencies">
        <input type="hidden" name="id_currency" id="id_currency" value=""/>
		<input type="hidden" name="SubmitCurrency" value="" />
        {$blockcurrencies_sign}<span class="arrow_header_top"></span>    
		</p>
		<ul id="first-currencies" class="currencies_ul list_header">
			{foreach from=$currencies key=k item=f_currency}
				<li {if $cookie->id_currency == $f_currency.id_currency}class="selected"{/if}>
                {if $cookie->id_currency == $f_currency.id_currency}
                            <span>{$f_currency.sign}</span>{$f_currency.name}
                {else}
					<a href="javascript:setCurrency({$f_currency.id_currency});" title="{$f_currency.name}"><span>{$f_currency.sign}</span>{$f_currency.name}</a>
                    
        
                    
                    			
                    {/if}
				</li>
			{/foreach}
		</ul>
	</form>
</section>
<!-- /Block currencies module -->