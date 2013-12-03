function FileUploader(fileInput,fileSelect,displayBox)
{
	this.fileInput = fileInput;
	this.fileSelect = fileSelect;
	this.displayBox = displayBox;
	var dropbox;
	
	addEvents();
	
	//Methods
	//These functions can be called using an instance of this object
	FileUploader.prototype.dropboxSetup = function (domID)
	{
		dropbox = document.getElementById("dropbox");
		dropbox.addEventListener("dragenter", dragenter, false);
		dropbox.addEventListener("dragover", dragover, false);
		dropbox.addEventListener("drop", drop, false);
		
		function dragenter(e) 
		{
		  e.stopPropagation();
		  e.preventDefault();
		}

		function dragover(e) 
		{
		  e.stopPropagation();
		  e.preventDefault();
		}
		function drop(e) {
		  e.stopPropagation();
		  e.preventDefault();

		  var dt = e.dataTransfer;
		  var files = dt.files;
		  alert(files.length);
			
		  handleFiles(files);
		}
	};
	
	//Inside Functions
	//These functions are private, therefore can only be called from inside.
	function addEvents()
	{
		fileSelect.addEventListener("click", function (e) 
		{
		  if (fileInput) 
		  {
		    fileInput.click();
		  }
		  e.preventDefault(); // prevent navigation to "#"
		}, false);
		
		fileInput.addEventListener("change",function (e)
		{
			handleFiles(fileInput.files);
		},false);
	
	}
	
	function handleFiles(files) 
	{
	  processCompleted = false;
	  if(isFileSelected(files)) 
	  {
	  	clearDisplayBox();
		displaySelectedFiles(files);
	  }
	  else
	  {
	  	displayBox.innerHTML = "<p>No files selected!</p>";
	  }
	  return processCompleted;
	}
	function isFileSelected(files)
	{
		var isFileSelected = false;
		if (files.length > 0) 
	  	{
			isFileSelected = true;
	  	}
		return isFileSelected; 
	}
	function clearDisplayBox()
	{
		displayBox.innerHTML = '';
	}
	function displaySelectedFiles(files)
	{
		var list = document.createElement("ul");
	    for (var i = 0; i < files.length; i++) 
		{
	      var li = document.createElement("li");
	      list.appendChild(li);
	      
	      var img = document.createElement("img");
		  img.className = "images";
	      img.src = window.URL.createObjectURL(files[i]);
	      img.height = 60;
		  
	      img.onload = function(e) 
		  {
	        window.URL.revokeObjectURL(this.src);
	      }
		  
	      li.appendChild(img);
	      
	      var info = document.createElement("span");
		  info.className = "title";
	      info.innerHTML = files[i].name;
	      li.appendChild(info);
	    }
	    displayBox.appendChild(list);
	}
}