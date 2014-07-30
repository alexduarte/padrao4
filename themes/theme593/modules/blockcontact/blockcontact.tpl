<section id="contact_block" class="block column_box">
	<h4 class="title_block"><span>{l s='Contact us' mod='blockcontact'}</span></h4>
	<div class="block_content clearfix">
			<h5>{l s='Our hotline is available 24/7' mod='blockcontact'}</h5>
			{if $telnumber != ''}<p class="tel"><span class="label">{l s='Phone:' mod='blockcontact'}</span>{$telnumber|escape:'htmlall':'UTF-8'}</p>{/if}
			{if $email != ''}<a class="button" href="mailto:{$email|escape:'htmlall':'UTF-8'}">{l s='Contact our hotline' mod='blockcontact'}</a>{/if}
	</div>
</section>
