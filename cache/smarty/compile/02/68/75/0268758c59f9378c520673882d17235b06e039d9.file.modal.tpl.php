<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 02:52:48
         compiled from "C:\wamp\www\padrao4\admin6340\themes\default\template\helpers\modules_list\modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1174653d87a2059ba45-93054086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0268758c59f9378c520673882d17235b06e039d9' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\admin6340\\themes\\default\\template\\helpers\\modules_list\\modal.tpl',
      1 => 1406028793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1174653d87a2059ba45-93054086',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d87a205a75c5_33578460',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d87a205a75c5_33578460')) {function content_53d87a205a75c5_33578460($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div><?php }} ?>