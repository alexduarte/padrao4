$(document).ready(function()
{
	if (typeof(formatedAddressFieldsValuesList) != 'undefined')
		updateAddressesDisplay(true);
	resizeAddressesBox();
});

//update the display of the addresses
function updateAddressesDisplay(first_view)
{
	// update content of delivery address
	updateAddressDisplay('delivery');

	var txtInvoiceTitle = "";

	try{
		var adrs_titles = getAddressesTitles();
		txtInvoiceTitle = adrs_titles.invoice;
	}
	catch (e)
	{

	}

	// update content of invoice address
	//if addresses have to be equals...

	if ($('input[type=checkbox]#addressesAreEquals:checked').length == 1)
	{
		$('#address_invoice_form:visible').hide('fast');
		$('ul#address_invoice').html($('ul#address_delivery').html());
		$('ul#address_invoice li.address_title').html(txtInvoiceTitle);
	}
	else
	{
		$('#address_invoice_form:hidden').show('fast');
		if ($('select#id_address_invoice').val())
			updateAddressDisplay('invoice');
		else
		{
			$('ul#address_invoice').html($('ul#address_delivery').html());
			$('ul#address_invoice li.address_title').html(txtInvoiceTitle);
		}	
	}

	if(!first_view)
	{
		if (orderProcess == 'order')
			updateAddresses();
	}
	return true;
}

function updateAddressDisplay(addressType)
{		
	if (formatedAddressFieldsValuesList.length <= 0)
		return false;

	var idAddress = $('select#id_address_' + addressType + '').val();
	buildAddressBlock(idAddress, addressType, $('#address_'+ addressType));

	// change update link
	var link = $('ul#address_' + addressType + ' li.address_update a').attr('href');
	var expression = /id_address=\d+/;
	link = link.replace(expression, 'id_address='+idAddress);
	$('ul#address_' + addressType + ' li.address_update a').attr('href', link);
}

function updateAddresses()
{
	var idAddress_delivery = $('select#id_address_delivery').val();
	var idAddress_invoice = $('input[type=checkbox]#addressesAreEquals:checked').length == 1 ? idAddress_delivery : $('select#id_address_invoice').val();
   
   $.ajax({
           type: 'POST',
           url: baseDir + 'order.php',
           async: true,
           cache: false,
           dataType : "json",
           data: 'processAddress=true&step=2&ajax=true&id_address_delivery=' + idAddress_delivery + '&id_address_invoice=' + idAddress_invoice+ '&token=' + static_token ,
           success: function(jsonData)
           	{
           		if (jsonData.hasError)
				{
					var errors = '';
					for(error in jsonData.errors)
						//IE6 bug fix
						if(error != 'indexOf')
							errors += jsonData.errors[error] + "\n";
					alert(errors);
				}
		},
           error: function(XMLHttpRequest, textStatus, errorThrown) {alert("TECHNICAL ERROR: unable to save adresses \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);}
       });
   resizeAddressesBox();
}
