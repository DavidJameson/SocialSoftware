//Class developed in order to organize different files and
//its tag elements, also to make it easy to create a
//box containain all the information to be displayed.
function FileContainer(file)
{
	var container = this;
	
	this.file = file;
	this.imageField;
	this.infoField;
	this.progressBar;
	this.content;
	
	this.createContent = function()
	{
		container.content = document.createElement('div');
		container.content.className = 'content';
		container.createImageField('images');
		container.createInfoField('info');
		container.createProgressBar('progressBar');
		console.log(container.content);
	};
	this.createImageField = function(className)
	{
		container.imageField = document.createElement('img');
		container.imageField.className = className;
		container.imageField.src = window.URL.createObjectURL(file);
		container.imageField.onload = function(e) 
		{
		      window.URL.revokeObjectURL(this.src);
		}
		container.content.appendChild(container.imageField);
	};
	this.createInfoField = function(className)
	{
		container.infoField = document.createElement('span');
		container.infoField.className = className;
		container.infoField.innerHTML = file.name;
		container.content.appendChild(container.infoField);
	};
	this.createProgressBar = function(className)
	{
		container.progressBar = document.createElement('span');
		container.progressBar.className = className;
		container.progressBar.innerHTML = '0%';
		container.content.appendChild(container.progressBar);
	};
	
	this.createContent();
}