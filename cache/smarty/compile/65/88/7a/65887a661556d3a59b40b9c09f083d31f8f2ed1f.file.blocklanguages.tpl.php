<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 02:52:53
         compiled from "C:\wamp\www\padrao4\themes\free_sample\modules\blocklanguages\blocklanguages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:290853d87a254caa26-11987763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65887a661556d3a59b40b9c09f083d31f8f2ed1f' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\themes\\free_sample\\modules\\blocklanguages\\blocklanguages.tpl',
      1 => 1406695831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '290853d87a254caa26-11987763',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'language' => 0,
    'lang_iso' => 0,
    'indice_lang' => 0,
    'lang_rewrite_urls' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d87a255ff426_46016506',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d87a255ff426_46016506')) {function content_53d87a255ff426_46016506($_smarty_tpl) {?>

<!-- Block languages module -->
<div id="languages_block_top">
	<ul id="first-languages">
		<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
			<li <?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']==$_smarty_tpl->tpl_vars['lang_iso']->value){?>class="selected_language"<?php }?>>
				<?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']!=$_smarty_tpl->tpl_vars['lang_iso']->value){?>
				    <?php $_smarty_tpl->tpl_vars['indice_lang'] = new Smarty_variable($_smarty_tpl->tpl_vars['language']->value['id_lang'], null, 0);?>
					<?php if (isset($_smarty_tpl->tpl_vars['lang_rewrite_urls']->value[$_smarty_tpl->tpl_vars['indice_lang']->value])){?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['lang_rewrite_urls']->value[$_smarty_tpl->tpl_vars['indice_lang']->value];?>
" title="<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
">
					<?php }else{ ?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getLanguageLink($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
">
					<?php }?>

				<?php }?>
					<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>

				<?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']!=$_smarty_tpl->tpl_vars['lang_iso']->value){?>
					</a>
				<?php }?>
			</li>
		<?php } ?>
	</ul>
</div>
<!-- /Block languages module -->

<?php }} ?>