<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 02:52:53
         compiled from "C:\wamp\www\padrao4\themes\free_sample\modules\blockuserinfo\blockuserinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1636353d87a25a163d5-45590047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c13da8878fc3a6e11e7aaa19b9d60668cf2c20f0' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\themes\\free_sample\\modules\\blockuserinfo\\blockuserinfo.tpl',
      1 => 1406695831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1636353d87a25a163d5-45590047',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cookie' => 0,
    'link' => 0,
    'PS_CATALOG_MODE' => 0,
    'cart_qties' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d87a25bb0701_25712091',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d87a25bb0701_25712091')) {function content_53d87a25bb0701_25712091($_smarty_tpl) {?><!-- Block user information module HEADER -->
<div id="header_user">
<ul>
	<li id="header_user_info">
		<?php echo smartyTranslate(array('s'=>'Welcome','mod'=>'blockuserinfo'),$_smarty_tpl);?>
,
		<?php if ($_smarty_tpl->tpl_vars['cookie']->value->isLogged()){?>
			<span><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_lastname;?>
</span>
			(&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index.php');?>
?mylogout" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Log out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>&nbsp;)
		<?php }else{ ?>
			(&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account.php',true);?>
"><?php echo smartyTranslate(array('s'=>'Log in','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>&nbsp;)
		<?php }?>
	</li>
	<li id="your_account"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account.php',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Your Account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Your Account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a></li>
	<li id="shopping_cart">
		<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value).".php",true);?>
" title="<?php echo smartyTranslate(array('s'=>'Your Shopping Cart','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Cart:','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
		<span class="ajax_cart_quantity<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0){?> hidden<?php }?>"><?php echo $_smarty_tpl->tpl_vars['cart_qties']->value;?>
</span>
		<span class="ajax_cart_product_txt<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value!=1){?> hidden<?php }?>"><?php echo smartyTranslate(array('s'=>'product','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>
		<span class="ajax_cart_product_txt_s<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value<2){?> hidden<?php }?>"><?php echo smartyTranslate(array('s'=>'products','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>

		<span class="ajax_cart_no_product<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0){?> hidden<?php }?>"><?php echo smartyTranslate(array('s'=>'(empty)','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>
		<?php }?>
	</li>
</ul>
</div>
<!-- /Block user information module HEADER --><?php }} ?>