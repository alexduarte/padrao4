<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 02:52:54
         compiled from "C:\wamp\www\padrao4\modules\tmcategories\tmcategories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32853d87a260ac3b0-90067894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d1ce6dc2d3705d0e192ea91ce45c481dc3bb3b7' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\modules\\tmcategories\\tmcategories.tpl',
      1 => 1406695832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32853d87a260ac3b0-90067894',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_dir' => 0,
    'blockCategTree' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d87a26125569_21296187',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d87a26125569_21296187')) {function content_53d87a26125569_21296187($_smarty_tpl) {?><!-- TM Categories -->
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
superfish.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$('ul.sf-menu').superfish({
delay: 1000,
animation: {opacity:'show',height:'show'},
speed: 'fast',
autoArrows: false,
dropShadows: false
});
});
</script>

<div id="tmcategories">
	<ul id="cat" class="sf-menu">
	<?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blockCategTree']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['child']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['child']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
 $_smarty_tpl->tpl_vars['child']->iteration++;
 $_smarty_tpl->tpl_vars['child']->last = $_smarty_tpl->tpl_vars['child']->iteration === $_smarty_tpl->tpl_vars['child']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['blockCategTree']['last'] = $_smarty_tpl->tpl_vars['child']->last;
?>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['blockCategTree']['last']){?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['branche_tpl_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'last'=>'true'), 0);?>

		<?php }else{ ?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['branche_tpl_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('node'=>$_smarty_tpl->tpl_vars['child']->value), 0);?>

		<?php }?>
	<?php } ?>
	</ul>
</div>
<!-- /TM Categories --><?php }} ?>