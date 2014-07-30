<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" lang="en"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="{$lang_iso}"><!--<![endif]--><head>
	<meta charset="utf-8">
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
		<title>{$meta_title|escape:'htmlall':'UTF-8'}</title>
{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:html:'UTF-8'}" />
{/if}
{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:html:'UTF-8'}" />
{/if}

	<meta name="generator" content="PrestaShop" />
    <meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" />
	<meta name="author" content="Prestashop 1.5">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
    
    

    
<script>
    if (navigator.userAgent.match(/Android/i)) {
        var viewport = document.querySelector("meta[name=viewport]");
        viewport.setAttribute('content', 'initial-scale=1.0,maximum-scale=1.0,user-scalable=no,width=device-width,height=device-height');
    }
	if(navigator.userAgent.match(/Android/i)){
    window.scrollTo(0,1);
 }
</script> 
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />
		<script type="text/javascript">
			var baseDir = '{$content_dir}';
			var baseUri = '{$base_uri}';
			var static_token = '{$static_token}';
			var token = '{$token}';
			var priceDisplayPrecision = {$priceDisplayPrecision*$currency->decimals};
			var priceDisplayMethod = {$priceDisplay};
			var roundMode = {$roundMode};
		</script>
<link href="{$css_dir}normalize.css" rel="stylesheet" type="text/css" media="all" />
<link href="{$css_dir}bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="{$css_dir}bootstrap-responsive.css" rel="stylesheet" type="text/css" media="all" />
{if isset($css_files)}
{foreach from=$css_files key=css_uri item=media}
<link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />
{/foreach}
{/if}   
<link href="{$css_dir}320.css" rel="stylesheet" type="text/css" media="all" />
<link href="{$css_dir}480.css" rel="stylesheet" type="text/css" media="all" />
<link href="{$css_dir}768.css" rel="stylesheet" type="text/css" media="all" />

{if isset($js_files)}
{foreach from=$js_files item=js_uri}
<script type="text/javascript" src="{$js_uri}"></script>
{/foreach}
{/if}

<script src="{$js_dir}bootstrap.js"></script>
<script src="{$js_dir}plugins.js"></script>
<script src="{$js_dir}footable.js"></script>
<script  src="{$js_dir}jquery.core-ui-select.js"></script> 
<script src="{$js_dir}jquery.scrollpane.js"></script>
<script  src="{$js_dir}jquery.uniform.js"></script> 
<script src="{$js_dir}jquery.mousewheel.js"></script>
<script src="{$js_dir}mainscript.js"></script>
<script src="{$js_dir}/source/modernizr-2.5.3.min.js"></script>

{$HOOK_HEADER}
<script src="{$js_dir}jquery.carouFredSel-6.1.0.js"></script>
<script src="{$js_dir}jquery.touchSwipe.min.js"></script>
</head>
    <!--[if lt IE 8]><div style='clear:both;height:59px;padding:0 15px 0 15px;position:relative;z-index:10000;text-align:center;'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div><![endif]-->
<body {if isset($page_name)}id="{$page_name|escape:'htmlall':'UTF-8'}"{/if} >
    	{if !$content_only}
{if isset($restricted_country_mode) && $restricted_country_mode}
<div id="restricted-country">
  <p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>
</div>
{/if}
<div id="wrapp" >
       <div id="wrapp_2" >
                                <header id="header" class="container ">
                        
                                         <div  id="header-inner" >
       
                   <a id="header_logo" href="{$base_dir}" >
                     <img class="logo" src="{$logo_url}" alt="{$shop_name|escape:'htmlall':'UTF-8'}" {if $logo_image_width}width="{$logo_image_width}"{/if} {if $logo_image_height}height="{$logo_image_height}" {/if} />
                  </a>
          {$HOOK_TOP}
              
         </div>
                                 </header>
<div id="columns" class="container ">
                 <div class="row ">  
                 <div class="loader_page">    
                                <aside id="left_column"  class="span3 column" style=" display:none">
                                   {$HOOK_LEFT_COLUMN}
                                </aside>   
                         {if $page_name == 'index'}    
                         <div id="center_column" class="center_column span12 clearfix">
                        {else}
                          <div id="center_column" class="center_column span9 clearfix">
                        {/if} 
{/if} 