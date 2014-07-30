/*
* 2007-2011 PrestaShop 
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2011 PrestaShop SA
*  @version  Release: $Revision: 12887 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registred Trademark & Property of PrestaShop SA
*/

var ajaxQueries = new Array();
var ajaxLoaderOn = 0;
var sliderList = new Array();
var slidersInit = false;

$(document).ready(function()
						   
						   
{
	cancelFilter();
	openCloseFilter();
	
	// Click on color
	$('#layered_form input[type=button], #layered_form label.layered_color').live('click', function()
	{
		if (!$('\'input[name='+$(this).attr('name')+']:hidden\'').length)
			$('<input />').attr('type', 'hidden').attr('name', $(this).attr('name')).val($(this).attr('rel')).appendTo('#layered_form');
		else
			$('\'input[name='+$(this).attr('name')+']:hidden\'').remove();
		reloadContent();
	});
	
	// Click on checkbox
	$('#layered_form input[type=checkbox], #layered_form input[type=radio], #layered_form select').live('change', function()
	{
		reloadContent();
	});
	
	// Changing content of an input text
	$('#layered_form input.layered_input_range').live('keyup', function()
	{
		if ($(this).attr('timeout_id'))
			window.clearTimeout($(this).attr('timeout_id'));
		
		$(this).attr('timeout_id', window.setTimeout(function(it) {
			var filter = $(it).attr('id').replace(/^layered_(.+)_range_.*$/, '$1');
			
			var value_min = parseInt($('#layered_'+filter+'_range_min').val()); 
			if (isNaN(value_min)) 
				value_min = 0;
			$('#layered_'+filter+'_range_min').val(value_min);

			var value_max = parseInt($('#layered_'+filter+'_range_max').val());
			if (isNaN(value_max)) 
				value_max = 0;
			$('#layered_'+filter+'_range_max').val(value_max);
			
			if (value_max < value_min) {
				$('#layered_'+filter+'_range_max').val($(it).val());
				$('#layered_'+filter+'_range_min').val($(it).val());
			}
			reloadContent();
		}, 500, this));
	});

	$('.radio').live('click', function() {
		var name = $(this).attr('name');
		$.each($(this).parent().parent().find('input[type=button]'), function (it, item) {
			if ($(item).hasClass('on') && $(item).attr('name') != name) {
				$(item).click();
			}
		});
		return true;
	});
	
	// Click on label
	$('label a').live({
		click: function() {
			if ($(this).parent().parent().find('input').attr('disabled') == '')
			{
				$(this).parent().parent().find('input').click();
				reloadContent();
			}
			return false;
		}
	});
	
	layered_hidden_list = {};
	$('.hide-action').live('click', function() {
		if (typeof(layered_hidden_list[$(this).parent().find('ul').attr('id')]) == 'undefined' || layered_hidden_list[$(this).parent().find('ul').attr('id')] == false)
		{
			layered_hidden_list[$(this).parent().find('ul').attr('id')] = true;
		}
		else
		{
			layered_hidden_list[$(this).parent().find('ul').attr('id')] = false;
		}
		hideFilterValueAction(this);
	});
	$('.hide-action').each(function() {
		hideFilterValueAction(this);
	});

	// Unbind event change on #selectPrductSort
	$('#selectPrductSort').unbind('change');

	// To be sure there is no other events attached to the selectPrductSort, change the ID
	$('#selectPrductSort').attr('onchange', '');
	$('#selectPrductSort').attr('id', 'selectPrductSort2');
	$('label[for=selectPrductSort]').attr('for', 'selectPrductSort2');
	$('#selectPrductSort2').live('change', function(event) {
		reloadContent();
	});
	
	paginationButton();
	initLayered();
});
	
function hideFilterValueAction(it)
{
	if (typeof(layered_hidden_list[$(it).parent().find('ul').attr('id')]) == 'undefined' || layered_hidden_list[$(it).parent().find('ul').attr('id')] == false)
	{
		$(it).parent().find('.hiddable').hide();
		$(it).parent().find('.hide-action.less').hide();
		$(it).parent().find('.hide-action.more').show();
	}
	else
	{
		$(it).parent().find('.hiddable').show();
		$(it).parent().find('.hide-action.less').show();
		$(it).parent().find('.hide-action.more').hide();
	}
}

function addSlider(type, data, unit)
{
	sliderList.push({
		type: type,
		data: data,
		unit: unit
	});
}

function initSliders()
{
	$(sliderList).each(function(i, slider){
		$('#layered_'+slider['type']+'_slider').slider(slider['data']);
		$('#layered_'+slider['type']+'_range').html($('#layered_'+slider['type']+'_slider').slider('values', 0)+slider['unit']+
			' - ' + $('#layered_'+slider['type']+'_slider').slider('values', 1 )+slider['unit']);
	});
}

function initLayered()
{
	initSliders();
	initLocationChange();
	updateProductUrl();
	if (window.location.href.split('#').length == 2 && window.location.href.split('#')[1] != '')
	{
		var params = window.location.href.split('#')[1];
		reloadContent('&selected_filters='+params);
	}
}

function paginationButton() {
	$('#pagination a').not(':hidden').each(function () {
		if ($(this).attr('href').search('&p=') == -1) {
			var page = 1;
		}
		else {
			var page = $(this).attr('href').replace(/^.*&p=(\d+).*$/, '$1');
		}
		var location = window.location.href.replace(/#.*$/, '');
		$(this).attr('href', location+current_friendly_url.replace(/\/page-(\d+)/, '')+'/page-'+page);
	});
	$('#pagination li').not('.current, .disabled').each(function () {
		var nbPage = 0;
		if ($(this).attr('id') == 'pagination_next')
			nbPage = parseInt($('#pagination li.current').children().html())+ 1;
		else if ($(this).attr('id') == 'pagination_previous')
			nbPage = parseInt($('#pagination li.current').children().html())- 1;
	
		$(this).children().click(function () {
			if (nbPage == 0)
				p = parseInt($(this).html()) + parseInt(nbPage);
			else
				p = nbPage;
			p = '&p='+ p;
			reloadContent(p);
			nbPage = 0;
			return false;
		});
	});
}

function cancelFilter()
{
	$('#enabled_filters a').live('click', function(e)
	{
		if ($(this).attr('rel').search(/_slider$/) > 0)
		{
			if ($('#'+$(this).attr('rel')).length)
			{
				$('#'+$(this).attr('rel')).slider('values' , 0, $('#'+$(this).attr('rel')).slider('option' , 'min' ));
				$('#'+$(this).attr('rel')).slider('values' , 1, $('#'+$(this).attr('rel')).slider('option' , 'max' ));
				$('#'+$(this).attr('rel')).slider('option', 'slide')(0,{values:[$('#'+$(this).attr('rel')).slider( 'option' , 'min' ), $('#'+$(this).attr('rel')).slider( 'option' , 'max' )]});
			}
			else if($('#'+$(this).attr('rel').replace(/_slider$/, '_range_min')).length)
			{
				$('#'+$(this).attr('rel').replace(/_slider$/, '_range_min')).val($('#'+$(this).attr('rel').replace(/_slider$/, '_range_min')).attr('limitValue'));
				$('#'+$(this).attr('rel').replace(/_slider$/, '_range_max')).val($('#'+$(this).attr('rel').replace(/_slider$/, '_range_max')).attr('limitValue'));
			}
		}
		else
		{
			if ($('option#'+$(this).attr('rel')).length)
			{
				$('#'+$(this).attr('rel')).parent().val('');
			}
			else
			{
				$('#'+$(this).attr('rel')).attr('checked', false);
				$('.'+$(this).attr('rel')).attr('checked', false);
				$('#layered_form input[name='+$(this).attr('rel')+']:hidden').remove();
			}
		}
		reloadContent();
		e.preventDefault();
	});
}

function openCloseFilter()
{
	$('#layered_form span.layered_close a').live('click', function(e)
	{
		if ($(this).html() == '&lt;')
		{
			$('#'+$(this).attr('rel')).show();
			$(this).html('v');
			$(this).parent().removeClass('closed');
		}
		else
		{
			$('#'+$(this).attr('rel')).hide();
			$(this).html('&lt;');
			$(this).parent().addClass('closed');
		}
		
		e.preventDefault();
	});
}

function stopAjaxQuery() {
	if (typeof(ajaxQueries) == 'undefined')
		ajaxQueries = new Array();
	for(i = 0; i < ajaxQueries.length; i++)
		ajaxQueries[i].abort();
	ajaxQueries = new Array();
}

function reloadContent(params_plus)
{
	stopAjaxQuery();
	
	if (!ajaxLoaderOn)
	{
		$('#product_list').prepend($('#layered_ajax_loader').html());
		$('#product_list').css('opacity', '0.5');
		ajaxLoaderOn = 1;
	}
	
	data = $('#layered_form').serialize();
	$('.layered_slider').each( function () {
		var sliderStart = $(this).slider('values', 0);
		var sliderStop = $(this).slider('values', 1);
		if (typeof(sliderStart) == 'number' && typeof(sliderStop) == 'number')
			data += '&'+$(this).attr('id')+'='+sliderStart+'_'+sliderStop;
	});

	$(['price', 'weight']).each(function(it, sliderType)
	{
		if ($('#layered_'+sliderType+'_range_min').length)
		{
			data += '&layered_'+sliderType+'_slider='+$('#layered_'+sliderType+'_range_min').val()+'_'+$('#layered_'+sliderType+'_range_max').val();
		}
	});
	
	$('#layered_form .select option').each( function () {
		if($(this).attr('id') && $(this).parent().val() == $(this).val())
		{
			data += '&'+$(this).attr('id') + '=' + $(this).val();
		}
	});
	
	if ($('#selectPrductSort2').length)
	{
		if ($('#selectPrductSort2').val().search(/orderby=/) > 0)
		{
			// Old ordering working
			var splitData = [
				$('#selectPrductSort2').val().match(/orderby=(\w*)/)[1],
				$('#selectPrductSort2').val().match(/orderway=(\w*)/)[1]
			];
		}
		else
		{
			// New working for default theme 1.4 and theme 1.5
			var splitData = $('#selectPrductSort2').val().split(':');
		}
		data += '&orderby='+splitData[0]+'&orderway='+splitData[1];
	}
	
	var slideUp = true;
	if (params_plus == undefined)
	{
		params_plus = '';
		slideUp = false;
	}
	
	// Get nb items per page
	var n = '';
	$('#pagination #nb_item').children().each(function(it, option) {
		if (option.selected)
			n = '&n='+option.value;
	});
	
	ajaxQuery = $.ajax(
	{
		type: 'GET',
		url: baseDir + 'modules/blocklayered/blocklayered-ajax.php',
		data: data+params_plus+n,
		dataType: 'json',
		success: function(result)
		{
			$('#layered_block_left').replaceWith(result.filtersBlock);
			
			$('.category-product-count').html(result.categoryCount);
			
			if (result.productList)
				$('#product_list').replaceWith(utf8_decode(result.productList));
			else
				$('#product_list').html('');

			$('#product_list').css('opacity', '1');
			$('div#pagination').html(result.pagination);
			paginationButton();
			ajaxLoaderOn = 0;
			
			// On submiting nb items form, relaod with the good nb of items
			$('#pagination form').submit(function() {
				val = $('#pagination #nb_item').val();
				$('#pagination #nb_item').children().each(function(it, option) {
					if (option.value == val)
						$(option).attr('selected', 'selected');
					else
						$(option).removeAttr('selected');
				});
				// Reload products and pagination
				reloadContent();
				return false;
			});
			if (typeof(ajaxCart) != "undefined")
				ajaxCart.overrideButtonsInThePage();
			
			if (typeof(reloadProductComparison) == 'function')
				reloadProductComparison();
			initSliders();
			
			// Currente page url
			if (typeof(current_friendly_url) == 'undefined')
				current_friendly_url = '#';
				
			// Get all sliders value
			$(['price', 'weight']).each(function(it, sliderType)
			{
				if ($('#layered_'+sliderType+'_slider').length)
				{
					// Check if slider is enable & if slider is used
					if(typeof($('#layered_'+sliderType+'_slider').slider('values', 0)) != 'object')
					{
						if ($('#layered_'+sliderType+'_slider').slider('values', 0) != $('#layered_'+sliderType+'_slider').slider('option' , 'min')
						|| $('#layered_'+sliderType+'_slider').slider('values', 1) != $('#layered_'+sliderType+'_slider').slider('option' , 'max'))
							current_friendly_url += '/'+sliderType+'-'+$('#layered_'+sliderType+'_slider').slider('values', 0)+'-'+$('#layered_'+sliderType+'_slider').slider('values', 1)
					}
				}
				else if ($('#layered_'+sliderType+'_range_min').length)
				{
					current_friendly_url += '/'+sliderType+'-'+$('#layered_'+sliderType+'_range_min').val()+'-'+$('#layered_'+sliderType+'_range_max').val();
				}
			});
			if (current_friendly_url == '#')
				current_friendly_url = '#/';
			window.location = current_friendly_url;
			lockLocationChecking = true;
			(function($) {
$(function() {

	function createCookie(name,value,days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
	}
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
	function eraseCookie(name) {
		createCookie(name,"",-1);
	}





	$('ul.product_view').each(function(i) {
		var cookie = readCookie('tabCookie'+i);
		if (cookie) $(this).find('li').eq(cookie).addClass('current').siblings().removeClass('current')
			.parents('#center_column').find('#product_list').addClass('list').removeClass('grid').eq(cookie).addClass('grid').removeClass('list');
	})

	$('ul.product_view').delegate('li:not(.current)', 'click', function(i) {
		$(this).addClass('current').siblings().removeClass('current')
			.parents('#center_column').find('#product_list').removeClass('grid').addClass('list').eq($(this).index()).addClass('grid').removeClass('list')
			
				var cookie = readCookie('tabCookie'+i);
		if (cookie) $(this).find('#product_list').eq(cookie).removeClass('grid').addClass('list').siblings().removeClass('list')
		
		
		
		var ulIndex = $('ul.product_view').index($(this).parents('ul.product_view'));
		eraseCookie('tabCookie'+ulIndex);
		createCookie('tabCookie'+ulIndex, $(this).index(), 365);
	})
	
	
	

	

})
})(jQuery)
			if(slideUp)
				$.scrollTo('#product_list', 400);
			updateProductUrl();
			
			$('.hide-action').each(function() {
				hideFilterValueAction(this);
			});
		}
	});
	ajaxQueries.push(ajaxQuery);
}

function initLocationChange(func, time)
{
	if(!time) time = 500;
	var current_friendly_url = getUrlParams();
	setInterval(function()
	{
		if(getUrlParams() != current_friendly_url && !lockLocationChecking)
		{
			// Don't reload page if current_friendly_url and real url match
			if (current_friendly_url.replace(/^#(\/)?/, '') == getUrlParams().replace(/^#(\/)?/, ''))
				return;
			
			lockLocationChecking = true;
			reloadContent('&selected_filters='+getUrlParams().replace(/^#/, ''));
		}
		else {
			lockLocationChecking = false;
			current_friendly_url = getUrlParams();
		}
	}, time);
}

function getUrlParams()
{
	var params = current_friendly_url;
	if(window.location.href.split('#').length == 2 && window.location.href.split('#')[1] != '')
		params = '#'+window.location.href.split('#')[1];
	return params;
}

function updateProductUrl()
{
	// Adding the filters to URL product
	$.each($('ul#product_list li.ajax_block_product .product_img_link, ul#product_list li.ajax_block_product h3 a, ul#product_list li.ajax_block_product .product_desc a'), function() {
		$(this).attr('href', $(this).attr('href') + param_product_url);
	});
	$(function(){
$('.list li').last().addClass('last');
})
}
/**
 * Copy of the php function utf8_decode()
 */
function utf8_decode (utfstr) {
	var res = '';
	for (var i = 0; i < utfstr.length;) {
		var c = utfstr.charCodeAt(i);

		if (c < 128)
		{
			res += String.fromCharCode(c);
			i++;
		}
		else if((c > 191) && (c < 224))
		{
			var c1 = utfstr.charCodeAt(i+1);
			res += String.fromCharCode(((c & 31) << 6) | (c1 & 63));
			i += 2;
		}
		else
		{
			var c1 = utfstr.charCodeAt(i+1);
			var c2 = utfstr.charCodeAt(i+2);
			res += String.fromCharCode(((c & 15) << 12) | ((c1 & 63) << 6) | (c2 & 63));
			i += 3;
		}
	}
	return res;
}