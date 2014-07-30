<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 16:10:10
         compiled from "C:\wamp\www\padrao4\admin6340\themes\default\template\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:375053d9350245a0c3-99309047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4cb4f62d057f4f2176272a14150989466bcffef' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\admin6340\\themes\\default\\template\\content.tpl',
      1 => 1406028791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '375053d9350245a0c3-99309047',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d935024811d3_92317408',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d935024811d3_92317408')) {function content_53d935024811d3_92317408($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>

<?php if (isset($_smarty_tpl->tpl_vars['content']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }?>
<?php }} ?>