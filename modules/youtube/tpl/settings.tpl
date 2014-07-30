<link rel="stylesheet" href="{$_path}css/backoffice.css" />
<form action="" method="post" id="youtube_form">						
	<fieldset><legend><img src="{$smarty.const._MODULE_DIR_}youtube/img/settings.png" alt="" title="" />{l s='Settings' mod='youtube'}</legend>
		<label>
            <img src="{$smarty.const._MODULE_DIR_}youtube/img/position.png" />
            <div>{l s='Display videos in:' mod='youtube'}</div>
        </label>
		<div class="margin-form">
			<input type="radio" name="YOUTUBE_POSITION" value="0" {if !$configs.YOUTUBE_POSITION}CHECKED{/if}/> {l s='Product footer' mod='youtube'} <br />
			<input type="radio" name="YOUTUBE_POSITION" value="1" {if $configs.YOUTUBE_POSITION}CHECKED{/if}/> {l s='Separate tab' mod='youtube'}
		</div>
		<div class="clear"></div>
		
		<label>
            <img src="{$smarty.const._MODULE_DIR_}youtube/img/dimentions.png" />
            <div>{l s='Video dimentions:' mod='youtube'}</div>
        </label>
		<div class="margin-form">
			{l s='width' mod='youtube'}:  <input type="text" name="YOUTUBE_WIDTH" value="{$configs.YOUTUBE_WIDTH}" style="width: 25px; margin-bottom: 7px;" /> px<br/>
			{l s='height' mod='youtube'}: <input type="text" name="YOUTUBE_HEIGHT" value="{$configs.YOUTUBE_HEIGHT}" style="width: 25px;" /> px	
		</div>
		<div class="clear"></div>
		
		<label>
            <img src="{$smarty.const._MODULE_DIR_}youtube/img/related.png" />
            <div style="width: 228px;">{l s='Show suggested videos when the video finishes' mod='youtube'}</div>
        </label>
		<div class="margin-form">
			<input type="checkbox" name="YOUTUBE_SHOW_RELATED" value="1" {if $configs.YOUTUBE_SHOW_RELATED}CHECKED{/if}/>
		</div>
		<div class="clear"></div>
		
		<label>
            <img src="{$smarty.const._MODULE_DIR_}youtube/img/hd_720.png" />
            <div style="width: 228px;">{l s='Force HD' mod='youtube'}</div>
        </label>
		<div class="margin-form">
			<input type="checkbox" name="YOUTUBE_FORCE_HD" value="1" {if $configs.YOUTUBE_FORCE_HD}CHECKED{/if}/>
		</div>
		<div class="clear"></div>
		
	</fieldset>
	
	<div style="margin-top:10px">
        <input type="submit" name="settings_update" value="{l s='Update' mod='youtube'}" class="button" />
    </div>
</form>