<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 02:52:56
         compiled from "C:\wamp\www\padrao4\themes\free_sample\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:585453d87a2825abe4-98666931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25ff426a19dcda7377c1d401a362a89b24b6d2ff' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\themes\\free_sample\\footer.tpl',
      1 => 1406695831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '585453d87a2825abe4-98666931',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
    'HOOK_FOOTER' => 0,
    'page_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d87a28295583_84662668',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d87a28295583_84662668')) {function content_53d87a28295583_84662668($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
		</div>
<!-- Right -->
		<div id="right_column" class="column"><?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>
</div>
		<div class="clearblock"></div>
	</div>
</div>
<!-- Footer -->
	<div id="footer_wrapper">
		<div id="footer">
			<?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

			<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?><!-- [[%FOOTER_LINK]] --><?php }?>
		</div>
	</div>
</div>
</div>
	<?php }?>
</body>
</html>
<?php }} ?>