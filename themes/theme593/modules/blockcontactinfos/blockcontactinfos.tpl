<section class="block blockcontactinfos span4">
	<h4>{l s='Contact us' mod='blockcontactinfos'}</h4>
	<ul class="toggle_content">
		{if $blockcontactinfos_company != ''}<li><strong>{$blockcontactinfos_company|escape:'htmlall':'UTF-8'}</strong></li>{/if}
		{if $blockcontactinfos_address != ''}<li>{$blockcontactinfos_address|escape:'htmlall':'UTF-8'}</li>{/if}
		{if $blockcontactinfos_phone != ''}<li>{l s='Tel:' mod='blockcontactinfos'} {$blockcontactinfos_phone|escape:'htmlall':'UTF-8'}</li>{/if}
		{if $blockcontactinfos_email != ''}<li>{l s='Email:' mod='blockcontactinfos'} {mailto address=$blockcontactinfos_email|escape:'htmlall':'UTF-8' encode="hex"}</li>{/if}
	</ul>
</section>
