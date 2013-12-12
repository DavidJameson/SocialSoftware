function ImageDisplayContainer(image_name,image_path,image_description)
{
	var name = image_name;
	var path = image_path;
	var description = image_description;
	
	var container;
	var image_box;
	var name_box;
	var description_box;
	
	//class functions
	var createContainer = function(className)
	{
		container = document.createElement('div');
		createImageBox('image_box');
		createNameBox('name_box');
		createDescriptionBox('description_box');
	}
	var createImageBox = function(className)
	{
		image_box = document.createElement('img');
		image_box.className = className;
		image_box.src = path;
		container.appendChild(image_box);
	}
	var createNameBox = function(className)
	{
		name_box = document.createElement('span');
		name_box.className = className;
		name_box.innerHTML = name;
		container.appendChild(name_box);
	}
	var createDescriptionBox = function(className)
	{
		description_box = document.createElement('span')
		description_box.className = className;
		description_box.innerHTML = description;
		container.appendChild(description_box);
	}
	createContainer('display_container');
	//Getters and Setters
	this.getName = function()
	{
		return name;
	}
	this.setName = function(name_in)
	{
		name = name_in;
	}
	this.getPath = function()
	{
		return path;
	}
	this.setPath = function(path_in)
	{
		path = path_in;
	}
	this.getDescription = function()
	{
		return description;
	}
	this.setDescription = function(description_in)
	{
		description = description_in;
	}
	this.getContainer = function()
	{
		return container;
	}
	this.getImageBox = function()
	{
		return image_box;
	}
	this.getNameBox = function()
	{
		return name_box;
	}
	this.getDescriptionBox = function()
	{
		return description_box;
	}
}