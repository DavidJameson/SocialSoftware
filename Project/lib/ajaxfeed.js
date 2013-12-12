function feed(method,page,id)
{
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();		
	}
	else
	{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}

	xmlhttp.onreadystatechange = function ()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById(id).innerHTML = xmlhttp.responseText;
		}			
	}
	xmlhttp.open(method,page,true);
	xmlhttp.send();
}
function livefeed(method,page,id,timeout)
{
	feed(method,page,id);
	setInterval(function()
				{
					feed(method,page,id);
				},
				timeout);
}