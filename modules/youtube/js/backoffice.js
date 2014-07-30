var wait_for_typer = 1000;

$(function(){
    $("#connector").treeview({
        animated: "fast",
        unique: true
    });	
    
    $(".category_select").live('click', function(){
        var id_category = $(this).attr('rel').replace('ajax_id_product_', '');    
        getProducts(this, id_category, 1);
		toggleFieldsets(false);
		$('#selected_category').val(id_category);
    });
    
    $(".category_page_select").live('click', function(){
        var id_category = $(this).attr('rel').replace('ajax_id_product_', '');
        var page = $(this).attr("rel1");
        getProducts(this, id_category, page);
		toggleFieldsets(false);
    });
    
    $(".product_selection").live('click', function(){
		$(this).addClass('selected').siblings().removeClass('selected');
		$('#youtube-module-loader').show();
        var id_product = $(this).attr('rel');
		var params = 'ajax=true&getProductVideos=true&id_product=' + id_product + '&token=' + module_token;
		$('#selected_product').val(id_product);
		$.post(_path + "youtube-ajax.php", params, function(resp)
		{
			resp = JSON.parse(resp);
			
			if (!resp.empty)
			{
				$('#assigned_videos #videos_list tbody').html(resp.data);
				$('#assigned_videos #videos_list').show();
				$('#empty_list').hide();
				initDragNDrop();
			}
			else
			{
				$('#assigned_videos #videos_list').hide();
				$('#assigned_videos #videos_list tbody').html('');
				$('#empty_list').show();
			}
			toggleFieldsets(true);
			$('#youtube-module-loader').hide();
		});
    });
	
    $('.delete_on').live('click', function() {
		wait_for_typer = 0;
        $(this).siblings('input').val('').blur().keyup();
		wait_for_typer = 1000;
    });
	
	$('.category-search').keyup(function() {
		var searchObj = this;
		if ($(this).val() == '' || $(this).hasClass('defaultTextActive') || $(this).val() == _lang_search)
		{
			$(this).siblings('img').removeClass('delete_on').attr('src', ($(this).siblings('img').attr('src').replace('ico_delete', 'icon_x_delete_off')));
		}
		else
		{
			$(this).siblings('img').addClass('delete_on').attr('src', ($(this).siblings('img').attr('src').replace('icon_x_delete_off', 'ico_delete')));
		}
		
		delaySearch(function(){
			$(searchObj).parents('table:first').addClass('table-loader');
			getProducts(searchObj, $('#selected_category').val(), 1);
		}, wait_for_typer );
	});
	
	$('#videos_list .video_status').live('click', function(){
		var $obj = $(this);
		var src = $obj.attr('src');
		var status = $obj.attr('rel');
		var id_video = $obj.parents('tr:first').attr('id');
		var params = 'ajax=true&toggleVideoStatus=true&id_video=' + encodeURIComponent(id_video) + '&status=' + encodeURIComponent(status) + '&token=' + module_token;
		
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			url: _path+"youtube-ajax.php",
			data: params,
			success: function(resp)
			{
				if (resp.hasError)
				{
					displayMsg(true, resp.error)
				}
				else
				{
					if (Number(status) == 0)
					{
						$obj.attr('src', src.replace('disabled', 'enabled')).attr('rel', 1);
					}
					else
					{
						$obj.attr('src', src.replace('enabled', 'disabled')).attr('rel', 0);
					}
					
					displayMsg(false, resp.success)
				}
			}
		});		
	});
	
	$('#videos_list .video_delete').live('click', function(){
		var $obj = $(this);
		var id_video = $obj.parents('tr:first').attr('id');
		var params = 'ajax=true&deleteVideo=true&id_video=' + encodeURIComponent(id_video) + '&token=' + module_token;
		
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			url: _path+"youtube-ajax.php",
			data: params,
			success: function(resp)
			{
				if (resp.hasError)
				{
					displayMsg(true, resp.error)
				}
				else
				{
					$obj.parents('tr:first').fadeOut(300, function(){
						$(this).remove();
						checkIfVideosListIsEmpty();
					});
					displayMsg(false, resp.success);
				}
			}
		});		
	});
	
	$('#add_video').click(function(){
		$('#youtube-module-loader').show();
		var url = $(this).parents('fieldset:first').find('textarea').val();
		var id_product = $('#selected_product').val();
		var params = 'ajax=true&addVideo=true&id_product=' + encodeURIComponent(id_product) + '&url=' + encodeURIComponent(url) + '&token=' + module_token;
		$.post(_path+"youtube-ajax.php", params, function(resp)
		{
			resp = JSON.parse(resp);
			if (resp.hasError)
			{
				$('#youtube-module-loader').hide();
				displayMsg(true, resp.error);
			}
			else
			{
				var data = resp.data;
				$('#videos_list tbody').append(data);
				initDragNDrop();
				checkIfVideosListIsEmpty();
				displayMsg(false, resp.success)
			}
			$('#youtube-module-loader').hide();
		});
	});
	
	$(".defaultText").focus(function(srcc){
		if ($(this).val() == $(this)[0].title)
		{
			$(this).removeClass("defaultTextActive");
			$(this).val("");
		}
	});
	
	$(".defaultText").blur(function()
	{
		if ($(this).val() == "")
		{
			$(this).addClass("defaultTextActive");
			$(this).val($(this)[0].title);
		}
	});
	$(".defaultText").blur();
});

/* delay for typing */
var delaySearch = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

function toggleFieldsets(show)
{
	if (show)
	{
		$('#assign_video').slideDown('fast');
		$('#assigned_videos').slideDown('fast');
	}
	else
	{
		$('#assign_video').slideUp('fast');
		$('#assigned_videos').slideUp('fast');
	}
}

function getProducts(obj, id_category, page)
{
	var search_val = '';
	if ($(obj).hasClass('category-search'))
	{
		if ($(obj).val() != _lang_search)
			search_val = $(obj).val();
	}
	else
	{
		$parent = $(obj).parents('ul:last');
		$parent.find(".category_select").css('font-weight', 'normal');
		$(obj).css('font-weight', 'bold');
		
		$search_input = $('.category-search');
		if (!$search_input.hasClass('defaultTextActive') && $search_input.val() != _lang_search)
		{
			search_val = $search_input.val();
		}
		$("#connector_products").parent().addClass('table-loader');
		
	}
    
    var params = "ajax=true&getProductList=true&id_category=" + id_category + '&page=' + page + '&token=' + module_token + '&search_val=' + encodeURIComponent(search_val);
	
	$.ajax({
		type: "POST",
		async: false,
		url: _path+"youtube-ajax.php",
		data: params,
		success: function(resp)
		{
			$("#connector_products").html(resp);
		}
	});	
	
	$("#connector_products").parent().removeClass('table-loader');
}

function checkIfVideosListIsEmpty()
{
	var videos = $('#videos_list tbody tr').length;
	if (!videos)
	{
		$('#assigned_videos #videos_list').hide();
		$('#empty_list').show();
	}
	else
	{
		$('#assigned_videos #videos_list').show();
		$('#empty_list').hide();
	}
}

function displayMsg(error, message)
{
    var time = 3000;
    $object = $('#success_youtube');
	$object.text(message);
    
    if (error)
    {
        $object.addClass('tags_error');
    }
    
    $object.fadeIn('fast');
    setTimeout(function() {
        $object.fadeOut(300, function(){
            if (error) $object.removeClass('tags_error');
        });
    }, time);
}

function initDragNDrop()
{
	$('#videos_list').tableDnD({
		onDrop: function(table, row) {
			$.ajax({
				type: "POST",
				url: _path+'youtube-ajax.php',
				dataType: "json",
				data: 'ajax=true&positionVideos=true&' + $.tableDnD.serialize() + '&token=' + module_token,
				success: function(resp)
				{
					if (resp.hasError)
					{
						displayMsg(true, resp.error)
					}
					else
					{
						displayMsg(false, resp.success)
					}
				}
			});
		},
		onDragClass: 'myDragClass',
		dragHandle: "position"
	});
}