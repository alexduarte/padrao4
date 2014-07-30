<?php /* Smarty version Smarty-3.1.14, created on 2014-07-30 16:10:16
         compiled from "C:\wamp\www\padrao4\modules\tmnivoslider\tmnivoslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3151153d9350820e7d0-34071319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f64f12f7d54d96e11e1b8cff2ffdf3df3592f8f9' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\modules\\tmnivoslider\\tmnivoslider.tpl',
      1 => 1406695832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3151153d9350820e7d0-34071319',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this_path' => 0,
    'xml' => 0,
    'link' => 0,
    'home_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d93508347053_73118837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d93508347053_73118837')) {function content_53d93508347053_73118837($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
js/nivo.slider.js"></script>
<div id="tmnivoslider"> 	
    <div id="slider">
	<?php  $_smarty_tpl->tpl_vars['home_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['xml']->value->link; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['links']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['home_link']->key => $_smarty_tpl->tpl_vars['home_link']->value){
$_smarty_tpl->tpl_vars['home_link']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['links']['iteration']++;
?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index.php');?>
<?php echo $_smarty_tpl->tpl_vars['home_link']->value->url;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index.php');?>
modules/tmnivoslider/<?php echo $_smarty_tpl->tpl_vars['home_link']->value->img;?>
" alt="" title="#htmlcaption<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['links']['iteration'];?>
" /></a>
	<?php } ?>
	</div>
	<?php  $_smarty_tpl->tpl_vars['home_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['xml']->value->link; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['links']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['home_link']->key => $_smarty_tpl->tpl_vars['home_link']->value){
$_smarty_tpl->tpl_vars['home_link']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['links']['iteration']++;
?>
		<div id="htmlcaption<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['links']['iteration'];?>
" class="nivo-html-caption">
			<h2><?php echo $_smarty_tpl->tpl_vars['home_link']->value->field1;?>
<span><?php echo $_smarty_tpl->tpl_vars['home_link']->value->field2;?>
</span></h2>
			<p class="slide_descr1"><?php echo $_smarty_tpl->tpl_vars['home_link']->value->field3;?>
</p>
			<p class="slide_descr2"><?php echo $_smarty_tpl->tpl_vars['home_link']->value->field4;?>
 <span><?php echo $_smarty_tpl->tpl_vars['home_link']->value->field6;?>
</span></p>
			<!--/*<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index.php');?>
<?php echo $_smarty_tpl->tpl_vars['home_link']->value->url;?>
" class="slide_btn"><?php echo $_smarty_tpl->tpl_vars['home_link']->value->field5;?>
</a>*/-->
		</div>
	<?php } ?>
</div>
<script type="text/javascript">

$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'fade', //Specify sets like: 'fold,fade,sliceDown'
		slices:10,
		animSpeed:500, //Slide transition speed
		pauseTime:7000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false, //Next & Prev
		directionNavHide:false, //Only show on hover
		controlNav:true, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
      	controlNavThumbsFromRel:false, //Use image rel for thumbs
		controlNavThumbsSearch: '.jpg', //Replace this with...
		controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
		keyboardNav:true, //Use left & right arrows
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:1.0, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});

</script><?php }} ?>