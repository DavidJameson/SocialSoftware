function CommentBox(image_id)
{
	var image_id = image_id;
	var container;
	var commentArea;
	var commentInput;
	var addButton;
	
	this.addComment = function(comment_id,username,comment)
	{
		var commentHolder = document.createElement('div');
		commentHolder.id = comment_id;
		commentHolder.className = 'comment';
		var nameDisplay = document.createElement('span');
		nameDisplay.className = 'nameDisplay';
		nameDisplay.innerHTML = username;
		
		var commentDisplay = document.createElement('span');
		commentDisplay.className = 'commentDisplay';
		commentDisplay.innerHTML = comment;
		
		commentHolder.appendChild(nameDisplay);
		commentHolder.appendChild(commentDisplay);
		
		commentArea.appendChild(commentHolder);
	}
	var createContainer = function(className)
	{
		container = document.createElement('div');
		container.className = className;
		container.id = image_id+'_commentContainer';
		createCommentArea('commentArea');
		createCommentInput('commentInput');
		createAddButton('addButton');
		
	};
	var createCommentArea = function(className)
	{
		commentArea = document.createElement('span');
		commentArea.className = className;
		commentArea.placeholder = 'type in your comment, and click Add Comment.';
		container.appendChild(commentArea);
	};
	var createCommentInput = function(className)
	{
		commentInput = document.createElement('textarea');
		commentInput.className = className;
		
		container.appendChild(commentInput);
	};
	var createAddButton = function(className)
	{
		addButton = document.createElement('button');
		addButton.className = className;
		addButton.id = image_id+"_addbutton";
		addButton.innerHTML = "Add Comment";
		container.appendChild(addButton);
	};
	this.clearArea = function()
	{
		commentArea.innerHTML = "";
	};
	this.isCommentDisplayed = function(comment)
	{
		
	};
	//getters and stter
	this.getImageId = function()
	{
		return image_id;
	};
	this.getContainer = function()
	{
		return container;
	};
	this.getCommentArea = function()
	{
		return commentArea;
	};
	this.getCommentInput = function()
	{
		return commentInput;
	};
	this.getAddButton = function()
	{
		return addButton;
	};
	this.setAddButton = function(button)
	{
		addButton = button;	
	};
	createContainer('comments_container');
}