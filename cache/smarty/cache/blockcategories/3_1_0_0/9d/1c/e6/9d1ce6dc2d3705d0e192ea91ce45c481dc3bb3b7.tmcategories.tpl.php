<?php /*%%SmartyHeaderCode:1351453d93507016244-50346129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '1351453d93507016244-50346129',
  'variables' => 
  array (
    'module_dir' => 0,
    'blockCategTree' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d935070be207_15842956',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d935070be207_15842956')) {function content_53d935070be207_15842956($_smarty_tpl) {?><!-- TM Categories -->
<script type="text/javascript" src="/padrao4/modules/tmcategories/superfish.js"></script>

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
		</ul>
</div>
<!-- /TM Categories --><?php }} ?>