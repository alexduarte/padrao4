<style>
	.position
	{
		background: url("{$smarty.const._PS_ADMIN_IMG_}arrow_out.png") no-repeat scroll center center transparent;
		cursor: move;
	{
</style>
<script type="text/javascript" src="{$smarty.const._MODULE_DIR_}youtube/js/jquery.tablednd_0_5.js"></script>

<script type="text/javascript">
	var module_token = '{$module_token}';
	var _path = '{$_path}';
	var _lang_empty = '{l s='Empty' mod='youtube'}';
	var _lang_search = '{l s='Search...' mod='youtube'}';
</script>
<script src="{$_path}js/jquery.treeview.js" type="text/javascript"></script>
<script src="{$_path}js/backoffice.js" type="text/javascript"></script>
<link rel="stylesheet" href="{$_path}img/jquery.treeview.css" />
<link rel="stylesheet" href="{$_path}css/backoffice.css" />

<form action="" method="post" id="youtube_form">
	<fieldset id="connector_selection">
		<legend>
			<img src="{$smarty.const._MODULE_DIR_}youtube/img/cart_small.png" />{l s='Select product' mod='youtube'}
		</legend>
		<label>
			<img src="{$smarty.const._MODULE_DIR_}youtube/img/folder.png" />
			<div>{l s='Category' mod='youtube'}</div>
		</label>
		<div class="margin-form">
			<ul id="connector" class="treeview">
			{$tree}
			</ul>
		</div>
		<div class="clear"></div>
		<div class="divider"></div>
		<label><img src="{$smarty.const._MODULE_DIR_}youtube/img/cart.png" /><div>{l s='Product' mod='youtube'}</div></label>
		<div class="margin-form">
			<table cellspacing="0" cellpadding="0" width="100%" class="table">
				<thead>
					<tr>
						<th class="center" width="20">{l s='ID' mod='youtube'}</th>
						<th width="45">{l s='Image' mod='youtube'}</th>
						<th>{l s='Title' mod='youtube'}</th>
						<th width="150">
							<input type="text" class="fleft category-search defaultText defaultTextActive" style="width: 121px;" title="{l s='Search...' mod='youtube'}">
							<img src="{$smarty.const._MODULE_DIR_}youtube/img/icon_x_delete_off.gif" style="margin-top: 4px; margin-left: 5px;" class="fleft" />
							<div class="clear"></div>
						</th>
					</tr>
				</thead>
				<tbody id="connector_products">
					{$products}					
				</tbody>
				<input type="hidden" value="0" id="selected_product"/>
				<input type="hidden" value="-1" id="selected_category"/>
			</table>
		</div>
		<div class="clear"></div>
	</fieldset>
	<fieldset id="assign_video" style="display:none">					
		<legend><img src="{$smarty.const._MODULE_DIR_}youtube/logo.gif" style="margin-bottom:1px" />{l s='Assign video' mod='youtube'}</legend>
		<label style="margin-top: 15px;line-height: 35px;">
			<img src="{$smarty.const._MODULE_DIR_}youtube/img/link.png" />
			{l s='Youtube URL:' mod='youtube'}
		</label>
		<div class="margin-form">
			<textarea style="width: 90%;"></textarea>
		</div>
		<div class="clear"></div>
		
		<div class="margin-form clear">
			<input type="button" value="{l s='Add' mod='youtube'}" class="button" id="add_video"/>			
		</div>
	</fieldset>
	
	<fieldset id="assigned_videos" style="display:none">					
		<legend><img src="{$smarty.const._PS_ADMIN_IMG_}tab-categories.gif" />{l s='Videos' mod='youtube'}</legend>
		<table id="videos_list" class="table" style="width:100%; display:none">
			<thead>
				<tr class="nodrag nodrop">
					<th width="20" class="center">{l s='Position' mod='youtube'}</th>
					<th width="135" class="center">{l s='Cover' mod='youtube'}</th>
					<th>{l s='Title' mod='youtube'}</th>
					<th width="265">{l s='URL' mod='youtube'}</th>
					<th width="20" class="center">{l s='Status' mod='youtube'}</th>
					<th width="20" class="center">{l s='Delete' mod='youtube'}</th>
				<tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<div id="empty_list" style="display:none"><i>{l s='Empty' mod='youtube'}</i></div>
	</fieldset>
</form>
<div id="success_youtube"></div>
<div id="youtube-module-loader"></div>