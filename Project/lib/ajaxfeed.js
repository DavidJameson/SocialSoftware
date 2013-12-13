function sendData(method,page,commentBox,image_id)
{
	var data = new FormData();
	var box = commentBox;
	var imageID = image_id;
	
	data.append('image_id',imageID);
	data.append('comment',getComment(box));
	
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
			//alert(xmlhttp.responseText);
			box.getCommentInput().value= '';
			alert('Your Comment Was Added');
			getCommentData('POST','PHP/CommentFeed.get.php',data,box,imageID);
			//console.log(data);
		}			
	}
	xmlhttp.open(method,page,true);
	xmlhttp.send(data);
}
function getCommentData(method,page,data,commentBox,image_id)
{
	//document.getElementById(image_id).innerHTML = $(commentBox.getContainer()).html();
	
		
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
			//alert(xmlhttp.responseText);
			//console.log(JSON.parse(xmlhttp.responseText));
			var array = JSON.parse(xmlhttp.responseText);
			commentBox.clearArea();
			if(array.length > 0)
			{
				for(i=0; i< array.length;i++ )
				{
					
					commentBox.addComment(array[i][0],array[i][1],array[i][2]);
				}
				commentBox.getCommentArea().style.textAlign = 'left';
			}
			else
			{
				commentBox.getCommentArea().innerHTML = "There's no comments yet, be the first one.";
			}
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
	setInterval(function()
				{
					feed(method,page,id);
				},
				timeout);
}