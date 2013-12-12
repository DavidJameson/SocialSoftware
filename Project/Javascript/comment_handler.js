$(document).ready(function()
{

	//var commentBox = new CommentBox();
	data = new FormData();
	data.append('image_id',2);
	
		
	//getCommentData('POST','PHP/CommentFeed.get.php',data,commentBox);
	//setInterval(function(){getCommentData('POST','PHP/CommentFeed.get.php',data,commentBox)},3000);
	
	/*var button = commentBox.getAddButton();
	$(button).bind('click',function(e)
	{
		data = new FormData();
		data.append('user','laerte');
		data.append('image_id',2);
		data.append('comment',$(commentBox.getCommentInput()).val());
		
		sendData('POST','PHP/CommentFeed.add.php',data);
	});*/
	
	//$('#comments').append(commentBox.getContainer());
	
});
function displayComment(image_id)
{
	var commentBox = new CommentBox();
	var button = commentBox.getAddButton()
	data = new FormData();
	data.append('image_id',image_id);
	
	$(button).bind('click',function(e)
	{
				data = new FormData();
				data.append('image_id',image_id);
				data.append('comment',$(commentBox.getCommentInput()).val());
		alert('here');
				sendData('POST','../PHP/CommentFeed.add.php',data);
	});
	commentBox.setAddButton(button);
	getCommentData('POST','PHP/CommentFeed.get.php',data,commentBox,image_id);
	//setInterval(function(){getCommentData('POST','PHP/CommentFeed.get.php',data,commentBox)},3000);
	button_id = image_id+'_button';
	button = document.getElementById(button_id);
	/*if(isHidden(commentBox))
	{
		commentBox.style.display = 'block';
		button.innerHTML = "View Comments";		
	}
	else
	{
		commentBox.style.display = 'none';
		button.innerHTML = "Hide Comments";
	}*/
}
function isHidden(box)
{
	if(box.style.display == 'none')
	{
		return true;
	}
	else
	{
		return false;
	}
}

