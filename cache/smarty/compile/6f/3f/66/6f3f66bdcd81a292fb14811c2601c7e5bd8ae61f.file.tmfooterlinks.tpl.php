<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 02:52:55
         compiled from "C:\wamp\www\padrao4\modules\tmfooterlinks\tmfooterlinks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1673953d87a27a2a8e9-53933857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f3f66bdcd81a292fb14811c2601c7e5bd8ae61f' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\modules\\tmfooterlinks\\tmfooterlinks.tpl',
      1 => 1406695832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1673953d87a27a2a8e9-53933857',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d87a27c2e3b5_24153466',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d87a27c2e3b5_24153466')) {function content_53d87a27c2e3b5_24153466($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\padrao4\\tools\\smarty\\plugins\\modifier.date_format.php';
?><div id="tmfooterlinks">
<div>
		<h4><?php echo smartyTranslate(array('s'=>'Information','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</h4>
		<ul class="first">
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact-form.php');?>
"><?php echo smartyTranslate(array('s'=>'Contact','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('sitemap.php');?>
"><?php echo smartyTranslate(array('s'=>'Sitemap','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cms.php?id_cms=2');?>
"><?php echo smartyTranslate(array('s'=>'Legal Notice','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cms.php?id_cms=3');?>
"><?php echo smartyTranslate(array('s'=>'Terms and conditions','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cms.php?id_cms=4');?>
"><?php echo smartyTranslate(array('s'=>'About us','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
		</ul>
	</div>
	<div>
		<h4><?php echo smartyTranslate(array('s'=>'Your Account','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</h4>
		<ul>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account.php');?>
"><?php echo smartyTranslate(array('s'=>'Your Account','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('identity.php');?>
"><?php echo smartyTranslate(array('s'=>'Personal information','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('addresses.php');?>
"><?php echo smartyTranslate(array('s'=>'Addresses','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('discount.php');?>
"><?php echo smartyTranslate(array('s'=>'Discount','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('history.php');?>
"><?php echo smartyTranslate(array('s'=>'Order history','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
		</ul>
	</div>
	<div>
		<h4><?php echo smartyTranslate(array('s'=>'Our offers','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</h4>
		<ul>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('new-products.php');?>
"><?php echo smartyTranslate(array('s'=>'New products','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('best-sales.php');?>
"><?php echo smartyTranslate(array('s'=>'Top sellers','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('prices-drop.php');?>
"><?php echo smartyTranslate(array('s'=>'Specials','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('manufacturer.php');?>
"><?php echo smartyTranslate(array('s'=>'Manufacturers','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('supplier.php');?>
"><?php echo smartyTranslate(array('s'=>'Suppliers','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</a></li>
		</ul>
	</div>
	<p>&copy; <?php echo smarty_modifier_date_format(time(),"%Y");?>
 <?php echo smartyTranslate(array('s'=>'Powered by','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
 <a href="http://www.prestashop.com">PrestaShop</a>&trade;. All rights reserved</p>
</div><?php }} ?>