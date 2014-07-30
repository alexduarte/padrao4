<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 02:52:54
         compiled from "C:\wamp\www\padrao4\modules\tmslider2\tmslider2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2791053d87a26382de8-58321815%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12d62e1fe31d1753fcfeb08d1fc3dbc43f3a795a' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\modules\\tmslider2\\tmslider2.tpl',
      1 => 1406695832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2791053d87a26382de8-58321815',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'xml' => 0,
    'home_link' => 0,
    'this_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d87a263ec593_01672477',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d87a263ec593_01672477')) {function content_53d87a263ec593_01672477($_smarty_tpl) {?><div id="tmslider2">
<ul>
	<?php  $_smarty_tpl->tpl_vars['home_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['xml']->value->link; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['links']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['home_link']->key => $_smarty_tpl->tpl_vars['home_link']->value){
$_smarty_tpl->tpl_vars['home_link']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['links']['iteration']++;
?>
	<li class="slide<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['links']['iteration'];?>
">
		<div><?php echo $_smarty_tpl->tpl_vars['home_link']->value->desc;?>
</div>
		<a href="<?php echo $_smarty_tpl->tpl_vars['home_link']->value->url;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
<?php echo $_smarty_tpl->tpl_vars['home_link']->value->img;?>
" alt="" /></a>
	</li>
	<?php } ?>
</ul>
</div><?php }} ?>