<?php /*%%SmartyHeaderCode:2724453d93506b12889-88868807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69b71de7c1e48595e313aed534d63696d6b9f951' => 
    array (
      0 => 'C:\\wamp\\www\\padrao4\\themes\\free_sample\\modules\\blocksearch\\blocksearch-top.tpl',
      1 => 1406695831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2724453d93506b12889-88868807',
  'variables' => 
  array (
    'link' => 0,
    'instantsearch' => 0,
    'search_ssl' => 0,
    'cookie' => 0,
    'ajaxsearch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d93506c3b709_81772385',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d93506c3b709_81772385')) {function content_53d93506c3b709_81772385($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top">
	<form method="get" action="http://localhost:8080/padrao4/search" id="searchbox">
		<label>Busca</label>
		<input class="search_query" type="text" id="search_query_top" name="search_query" value="" onFocus="" onBlur="" />
		<a href="javascript:document.getElementById('searchbox').submit();">Busca</a>
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		
	</form>
</div>
	<script type="text/javascript">
	// <![CDATA[
	
		$('document').ready( function() {
			$("#search_query_top")
				.autocomplete(
					'http://localhost:8080/padrao4/search', {
						minChars: 3,
						max: 10,
						width: 500,
						selectFirst: false,
						scroll: false,
						dataType: "json",
						formatItem: function(data, i, max, value, term) {
							return value;
						},
						parse: function(data) {
							var mytab = new Array();
							for (var i = 0; i < data.length; i++)
								mytab[mytab.length] = { data: data[i], value: data[i].cname + ' > ' + data[i].pname };
							return mytab;
						},
						extraParams: {
							ajaxSearch: 1,
							id_lang: 1
						}
					}
				)
				.result(function(event, data, formatted) {
					$('#search_query_top').val(data.pname);
					document.location.href = data.product_link;
				})
		});
	
	// ]]>
	</script>
<!-- /Block search module TOP --><?php }} ?>