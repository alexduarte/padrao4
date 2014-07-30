<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 02:52:53
         compiled from "C:\wamp\www\padrao4\modules\tmheaderlinks\tmheaderlinks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:368553d87a2564d645-15876061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc0e7125f42edfa48c58a2cb938634c111fcc504' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\modules\\tmheaderlinks\\tmheaderlinks.tpl',
      1 => 1406695832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '368553d87a2564d645-15876061',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'page_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d87a257205a7_35844637',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d87a257205a7_35844637')) {function content_53d87a257205a7_35844637($_smarty_tpl) {?><div class="clearblock"></div>
<ul id="tmheaderlinks">
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index.php');?>
"<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?> class="active"<?php }?>><?php echo smartyTranslate(array('s'=>'home','mod'=>'tmheaderlinks'),$_smarty_tpl);?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('prices-drop.php');?>
"<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='prices-drop'){?> class="active"<?php }?>><?php echo smartyTranslate(array('s'=>'specials','mod'=>'tmheaderlinks'),$_smarty_tpl);?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cms.php?id_cms=1');?>
"<?php if ($_GET['id_cms']=='1'){?> class="active"<?php }?>><?php echo smartyTranslate(array('s'=>'Delivery','mod'=>'tmheaderlinks'),$_smarty_tpl);?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact-form.php');?>
"<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='contact-form'){?> class="active"<?php }?>><?php echo smartyTranslate(array('s'=>'contact','mod'=>'tmheaderlinks'),$_smarty_tpl);?>
</a></li>
</ul><?php }} ?>