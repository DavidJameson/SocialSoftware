function sendData(method,page,data)
{
	var someData = data;
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
			alert(xmlhttp.responseText);
		}			
	}
	xmlhttp.open(method,page,true);
	xmlhttp.send(data);
}
function getCommentData(method,page,data,commentBox,image_id)
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
			alert(xmlhttp.responseText);
			//console.log(JSON.parse(xmlhttp.responseText));
			var array = JSON.parse(xmlhttp.responseText);
			for(i=0; i< array.length;i++ )
			{
				if(!document.getElementById(array[i][0]))
				{
					commentBox.addComment(array[i][0],array[i][1],array[i][2]);
				}
				else
				{
					alert('already exists '+array[i][0]);
				}
			}
			
			document.getElementById(image_id).innerHTML = $(commentBox.getContainer()).html();
		}			
	}
	xmlhttp.open(method,page,true);
	xmlhttp.send(data);
}
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
	//setInterval(function()
		//		{
		//			feed(method,page,id);
		//		},
		//		timeout);
}