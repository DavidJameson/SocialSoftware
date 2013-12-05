//This class is meant to be used for previewing, and
//uploading multiples files
function ImageFileUploader(fileInput,fileSelect,displayBox,files)
{
	var uploader = this;
	this.fileInput = fileInput;
	this.fileSelect = fileSelect;
	this.displayBox = displayBox;
	this.dropbox;
	this.filesArray = new Array();
	this.allowedTypes = ["image/jpg","image/jpeg","image/png"];
	
	//Methods
	//These functions can be called using an instance of this object
	this.addFilesToArray = function(files)
	{
		arraySize = files.length
		for(var i = 0; i < arraySize; i++)
		{
			var isImage = uploader.isImageFile(files[i])
			if(isImage)
			{
				name = files[i].name.replace(/\..+$/, ''); //removes files type from name
				
				var file = new ImageFileContainer(files[i],name);
				uploader.filesArray.push(file);
			}			
		}
	};
	this.isImageFile = function(file)
	{
		var fileType = file.type;
		var imageFile = false;
		for(type in uploader.allowedTypes)
		{
			if(uploader.allowedTypes[type] == fileType)
			{
				imageFile = true;
			}
		}
		
		return imageFile;
	};
	this.isFileSelected =function()
	{
		var isFileSelected = false;
		if (uploader.filesArray.length > 0) 
	  	{
			isFileSelected = true;
	  	}
		return isFileSelected; 
	};
	this.dropboxSetup = function (domID)
	{
		uploader.dropbox = document.getElementById(domID);
		uploader.dropbox.addEventListener("dragenter", dragenter, false);
		uploader.dropbox.addEventListener("dragover", dragover, false);
		uploader.dropbox.addEventListener("drop", drop, false);
		
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
		function drop(e) 
		{
			e.stopPropagation();
			e.preventDefault();

			var dt = e.dataTransfer;
			var files = dt.files;
			console.log(files);
			uploader.addFilesToArray(files);
			uploader.handleFiles();          
		}
	};
	
	this.uploadFiles = function()
	{
		for(var i =0; i < uploader.filesArray.length; i++)
		{
			uploader.sendFile(uploader.filesArray[i]);
		}
	};
	//Inside Functions
	//These functions are private, therefore can only be called from inside.
	this.sendFile = function(fileContainer) 
	{
			var uri = "PHP/ImageServerUploader.php";
            var xhr = new XMLHttpRequest();
            var fd = new FormData();
            
            xhr.open("POST", uri, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle response.
					 
                    if(xhr.responseText.length > 0)
					{
						alert(xhr.responseText);
					} 
                }
            };
			
			xhr.upload.addEventListener("progress", function(e) 
			{
		  	  if (e.lengthComputable) 
				{
		  		  	var percentage = Math.round((e.loaded * 100) / e.total);
					if(percentage < 100)
					{
						fileContainer.progressBar.innerHTML = percentage+'%';
					}
					else
					{
						fileContainer.progressBar.innerHTML = "Upload Completed";
					}
					if(percentage > 5)
					{
						fileContainer.progressBar.style.backgroundSize = percentage-5+'%'+" 							100%";
					}
				}
			}, false);
	
            fd.append('myFile', fileContainer.file);
            // Initiate a multipart/form-data upload
            xhr.send(fd);
	};

	this.addEvents = function()
	{
		uploader.fileSelect.addEventListener("click", function (e) 
		{
		  if (uploader.fileInput) 
		  {
		    uploader.fileInput.click();
		  }
		  e.preventDefault(); // prevent navigation to "#"
		}, false);
		
		uploader.fileInput.addEventListener("change",function (e)
		{
			uploader.addFilesToArray(uploader.fileInput.files);
			uploader.handleFiles(); 
		},false);
	};
	
	this.handleFiles = function() 
	{
		processCompleted = false;
		if(uploader.isFileSelected()) 
		{
			uploader.clearDisplayBox();
			uploader.displaySelectedFiles();
		}
		else
		{
			uploader.displayBox.innerHTML = "<p>No files selected!</p>";
		}
		return processCompleted;
	};
	
	this.clearDisplayBox = function()
	{
		uploader.displayBox.innerHTML = '';
	};
	this.displaySelectedFiles = function()
	{
		var container = document.createElement("div");
		container.id = "container";
		uploader.displayBox.appendChild(container);
		
	    for (var i = 0; i < uploader.filesArray.length; i++) 
		{
			fileContainer = uploader.filesArray[i].content;
			container.appendChild(fileContainer);		    
		}
	};
	
	this.addEvents();
}