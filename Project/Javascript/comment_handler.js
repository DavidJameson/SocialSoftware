$(document).ready(function()
{
	
});
function displayComment(image_id)
{
	var data = new FormData();
	data.append('image_id',image_id);
	commentBox = new CommentBox(image_id);
	document.getElementById(image_id).innerHTML = '';
	document.getElementById(image_id).appendChild(commentBox.getContainer());
	var button = commentBox.getAddButton();
	
	$(button).bind('click',
	{box:commentBox,imageID:image_id}
	,function(e)
	{	
		commentData = new FormData();
		commentData.append('image_id',e.data.imageID);
		commentData.append('comment',getComment(e.data.box));
		sendData('POST','PHP/CommentFeed.add.php',commentData);
		e.preventDefault();
	});

		
	console.log(button);
	
	getCommentData('POST','PHP/CommentFeed.get.php',data,commentBox,image_id);
	//setInterval(function(){getCommentData('POST','PHP/CommentFeed.get.php',data,commentBox)},5000);
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

