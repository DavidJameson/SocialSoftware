
function feed()
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
			document.getElementById('project').innerHTML = xmlhttp.responseText;
		}			
	}
	xmlhttp.open('GET','../ajax/ajax.php?',true);
	xmlhttp.send()
}/*
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
}*/
function livefeed()
{
	alert('here');
	setInterval(function(){feed()},1000);
}