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
	var content;
	
	var createContent = function()
	{
		content = document.createElement('div');
		content.className = 'content';
		createImageField('images');
		createInfoField('info');
		createProgressBar('progressBar');
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
		content.appendChild(imageField);
	};
	var createInfoField = function(className)
	{
		infoField = document.createElement('span');
		infoField.className = className;
		infoField.innerHTML = fileName;
		content.appendChild(infoField);
	};
	var createProgressBar = function(className)
	{
		progressBar = document.createElement('span');
		progressBar.className = className;
		progressBar.innerHTML = '0%';
		content.appendChild(progressBar);
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
	
	createContent();
}