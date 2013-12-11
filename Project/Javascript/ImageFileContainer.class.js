//Class developed in order to organize different files and
//its tag elements, also to make it easy to create a
//box containain all the information to be displayed.
function ImageFileContainer(image_file,image_name)
{
	var file = image_file;
	var fileName = image_name;

	var isFileUploaded = false;
	
	var imageField;
	var infoField;
	var progressBar;
	var sendButton;
	
	var nameInput;
	var descriptionInput;
		
	var content;
	var mainInfo;
	var userInput;
	
	var createContent = function()
	{
		content = document.createElement('div');
		content.className = 'image_content';
		
		mainInfo = document.createElement('div');
		mainInfo.className = 'mainInfo';
		
		userInput = document.createElement('div');
		userInput.className = 'userInput';
		
		createImageField('images');
		//createInfoField('info');
		createProgressBar('progressBar');
		createSendButton('sendButton');
		content.appendChild(mainInfo);
		
		createNameInput('name_input');
		createDescriptionInput('description_input');
		content.appendChild(userInput);
	};
	var createImageField = function(className)
	{
		imageField = document.createElement('img');
		imageField.className = className;
		imageField.src = window.URL.createObjectURL(file);
		imageField.onload = function(e) 
		{
		      window.URL.revokeObjectURL(this.src);
		}
		mainInfo.appendChild(imageField);
	};
	var createInfoField = function(className)
	{
		infoField = document.createElement('span');
		infoField.className = className;
		infoField.innerHTML = fileName;
		mainInfo.appendChild(infoField);
	};
	var createProgressBar = function(className)
	{
		progressBar = document.createElement('span');
		progressBar.className = className;
		progressBar.innerHTML = '0%';
		mainInfo.appendChild(progressBar);
	};
	var createSendButton = function(className)
	{
		sendButton = document.createElement('button');
		sendButton.className = className;
		sendButton.id = fileName;
		sendButton.innerHTML = 'Upload';
		mainInfo.appendChild(sendButton);
	};
	
	var createNameInput = function(className)
	{
		nameInput = document.createElement('input');
		nameInput.className = className;
		nameInput.type = 'text';
		nameInput.placeholder = "name your image...";
		
		//nameLabel = document.createElement('label');
		//nameLabel.innerHTML = "Name :";
		//userInput.appendChild(nameLabel);
		userInput.appendChild(nameInput);
	};
	var createDescriptionInput = function(className)
	{
		descriptionInput = document.createElement('textarea');
		descriptionInput.className = className;
		descriptionInput.maxlength = 300;
		descriptionInput.placeholder = "Describe your image...";
		
		//descLabel = document.createElement('label');
		//descLabel.innerHTML = "Image Description :";
		//userInput.appendChild(descLabel);
		userInput.appendChild(descriptionInput);
	};
	/* public functions */
	this.isNameInputEmpty = function()
	{
		isEmpty = false;
		if(nameInput.value == "")
		{
			isEmpty = true;
		}
		return isEmpty;		
	};
	this.isDescriptionInputEmpty = function()
	{
		isEmpty = false;
		if(descriptionInput.value == "")
		{
			isEmpty = true;
		}
		return isEmpty;
	};
	/*-- Getters and Setters --*/
	this.getFile = function()
	{
		return file;
	};
	this.setFile = function(file_ob)
	{
		file = file_ob;
	};
	this.getFileName = function()
	{
		return fileName;
	};
	this.setFileName = function(file_name)
	{
		fileName = file_name;
	};
	this.isUploaded = function()
	{
		return isFileUploaded;
	};
	this.setUploaded = function(isuploaded)
	{
		isFileUploaded = isuploaded;
	};
	this.getImageField = function()
	{
		return imageField;
	};
	this.setImageField = function(image_field)
	{
		imageField = image_field;
	};
	this.getInfoField = function()
	{
		return infoField;
	};
	this.setInfoField = function(info_field)
	{
		infoField = info_field;
	};
	this.getProgressBar = function()
	{
		return progressBar;
	};
	this.setProgressBar = function(progress_bar)
	{
		progressBar = progress_bar;
	};
	this.getContent = function()
	{
		return content;
	};
	this.setContent = function(cont)
	{
		content = cont;
	};
	this.getNameInput = function()
	{
		return nameInput;
	};
	this.setNameInput = function(nameInput_val)
	{
		nameInput = nameInput_val;
	};
	this.getDescriptionInput = function()
	{
		return descriptionInput;
	};
	this.setDescriptionInput = function(descriptionInput_val)
	{
		descriptionInput = descriptionInput_val;
	};
	this.getSendButton = function()
	{
		return sendButton;
	}
	createContent();
}