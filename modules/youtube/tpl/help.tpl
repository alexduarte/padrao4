<style>
{literal}
#invertus_help li
{
	margin-bottom:15px;
}

#invertus_help .mail a
{
	color:blue;
}

#invertus_help a:hover
{
	text-decoration:underline;
}

#invertus_help #invertus_logo
{
	float:left;
	margin-left:100px;
}

#invertus_help .img_go
{
	margin-left: 5px;
}
{/literal}
</style>

<div id="invertus_help">
{if $current_version < $version}
<div class="warning warn">
	<img alt="Confirmation" src="../img/admin/warning.gif">
		{l s='Module\'s version is out of date.' mod='youtube'} 
		<a href="{$url}" target="_blank">{l s='Upgrade to version' mod='youtube'} {$version}!</a>
	</div>
{else}
<div class="conf confirm"><img alt="Confirmation" src="../img/admin/ok.gif">{l s='Module\'s version is up to date' mod='youtube'}</div>
{/if}
	<fieldset>
		<ul style="float:left">
			{foreach $links as $link}
				<li class="mail">{$link}<img class="img_go" src="../modules/youtube/img/right.png"></li>
			{/foreach}
		</ul>
		<div id="invertus_logo">
			<a href="http://www.prestashopdocumentation.info/" target="_blank"><img src="../modules/youtube/img/logo.jpg" /></a>
		</div>
	</fieldset>
</div>