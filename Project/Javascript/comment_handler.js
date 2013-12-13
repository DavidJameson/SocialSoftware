function displayComment(image_id)
{
	var commentBox = new CommentBox(image_id);
	document.getElementById(image_id).innerHTML = '';
	document.getElementById(image_id).appendChild(commentBox.getContainer());
	
	var data = new FormData();
	data.append('image_id',image_id);
	
	var add_button = commentBox.getAddButton();
	
	$(add_button).bind
	(
		'click',
		{box:commentBox,imageID:image_id},
		function(e)
		{	
			commentData = new FormData();
			commentData.append('image_id',e.data.imageID);
			commentData.append('comment',getComment(e.data.box));
			if(isCommented(e.data.box))
			{
				sendData('POST','PHP/CommentFeed.add.php',e.data.box,e.data.imageID);	
			}
			else
			{
				alert('please enter comment before submit');
			}
			
			e.preventDefault();
		}
	);
	
	getCommentData('POST','PHP/CommentFeed.get.php',data,commentBox,image_id);
	//setInterval(function(){getCommentData('POST','PHP/CommentFeed.get.php',data,commentBox)},5000);
}
function isCommented(commentBox)
{
	textarea = commentBox.getCommentInput();
	
	if(textarea.value.length > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}
function getComment(commentBox)
{
	textarea = commentBox.getCommentInput();
	
	if(textarea.value.length > 0)
	{
		return textarea.value;
	}
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

