<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 02:52:54
         compiled from "C:\wamp\www\padrao4\modules\tmtextblock\tmtextblock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1123353d87a26177615-73294599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c53d42f16844f42aef290e51eba9c0c8e310fc97' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\modules\\tmtextblock\\tmtextblock.tpl',
      1 => 1406695832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1123353d87a26177615-73294599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'xml' => 0,
    'home_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d87a261c19a4_65446347',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d87a261c19a4_65446347')) {function content_53d87a261c19a4_65446347($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?>
<div id="tmtextblock">
<?php  $_smarty_tpl->tpl_vars['home_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['xml']->value->link; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['home_link']->key => $_smarty_tpl->tpl_vars['home_link']->value){
$_smarty_tpl->tpl_vars['home_link']->_loop = true;
?>
	<span class="txt2"><?php echo $_smarty_tpl->tpl_vars['home_link']->value->field1;?>
</span>
	<span class="txt1"><?php echo $_smarty_tpl->tpl_vars['home_link']->value->field2;?>
</span>
<?php } ?>
</div>
<?php }?><?php }} ?>