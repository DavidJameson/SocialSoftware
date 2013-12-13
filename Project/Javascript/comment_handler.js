$(document).ready(function()
{
	commentBoxArray = new Array();
});
function displayComment(image_id)
{	
	var commentBox;
	if(!isBoxCreated(image_id))
	{
		box = new CommentBox(image_id);
		commentBox = box;
		addBox(box);
	}
	else
	{
		commentBox = getBoxById(image_id);	
	}
	
	var viewButton = document.getElementById(image_id+'_button');
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
	
	switchDisplay(commentBox,viewButton);
	getCommentData('POST','PHP/CommentFeed.get.php',data,commentBox,image_id);
	
	//setInterval(function(){getCommentData('POST','PHP/CommentFeed.get.php',data,commentBox)},5000);
}
function addBox(commentBox)
{
	commentBoxArray.push(commentBox);
	console.log(commentBoxArray);
	document.getElementById(commentBox.getImageId()).innerHTML = '';
	document.getElementById(commentBox.getImageId()).appendChild(commentBox.getContainer());
}
function isBoxCreated(image_id)
{
	var isCreated = false;
	var i = 0;
	if(commentBoxArray.length > 0)
	{
		while(!isCreated && i < commentBoxArray.length)
		{
			if(commentBoxArray[i].getImageId() == image_id)
			{
				isCreated = true;
			}
			else
			{
				i++;
			}
		}
	}
	return isCreated;	
}
function getBoxById(image_id)
{
	var commentBox;
	var found = false;
	var i = 0;
	if(commentBoxArray.length > 0)
	{
		while(!found && i < commentBoxArray.length)
		{
			if(commentBoxArray[i].getImageId() == image_id)
			{
				commentBox = commentBoxArray[i];
				found = true;
			}
			else
			{
				i++;
			}
		}
	}
	return commentBox;
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
function switchDisplay(commentBox,viewButton)
{
	hidden = isHidden(commentBox.getContainer());
	box = document.getElementById(commentBox.getContainer().id);
	console.log(hidden);
	if(hidden)
	{
		box.style.display = 'block';
		viewButton.innerHTML = 'Hide Comments'
	}
	else
	{
		box.style.display = 'none';
		viewButton.innerHTML = 'Show Comments'
	}	
}
function isHidden(box)
{
	var hidden = true;
	var display = document.getElementById(box.id).style.display;
	if( display != 'none' && display != '')
	{
		hidden = false;
	}
	return hidden;
}
function getComment(commentBox)
{
	textarea = commentBox.getCommentInput();
	
	if(textarea.value.length > 0)
	{
		return textarea.value;
	}
}

