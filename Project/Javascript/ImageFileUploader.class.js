//This class is meant to be used for previewing, and
//uploading multiples files
function ImageFileUploader(fileInput,fileSelect,displayBox,files)
{
	var fileInput = fileInput;
	var fileSelect = fileSelect;
	var displayBox = displayBox;
	var dropbox;
	var filesArray = new Array();
	var allowedTypes = ["image/jpg","image/jpeg","image/png"];
	
	//Inside Functions
	//These functions are private, therefore can only be called from inside.
	var addFilesToArray = function(files)
	{
		arraySize = files.length;
		for(var i = 0; i < arraySize; i++)
		{
			var isImage = isImageFile(files[i]);
			if(isImage)
			{
				name = files[i].name.replace(/\..+$/, ''); //removes file's type from name
				fileContainer = new ImageFileContainer(files[i],name);
				sendButton = fileContainer.getSendButton();
				$(sendButton).bind('click',
				{container: fileContainer},function(e)
				{
					
					sendFile(e.data.container);
					e.preventDefault();
				});
				
				filesArray.push(fileContainer);
			}			
		}
	};
	var isImageFile = function(file)
	{
		var fileType = file.type;
		var imageFile = false;
		for(type in allowedTypes)
		{
			if(allowedTypes[type] == fileType)
			{
				imageFile = true;
			}
		}
		
		return imageFile;
	};
	var handleFiles = function() 
	{
		processCompleted = false;
		if(isFileSelected()) 
		{
			clearDisplayBox();
			displaySelectedFiles();
		}
		else
		{
			displayBox.innerHTML = "<p>No files selected!</p>";
		}
		return processCompleted;
	};
	var displaySelectedFiles = function()
	{
		var container = document.createElement("div");
		container.id = "container";
		displayBox.appendChild(container);
		
	    for (var i = 0; i < filesArray.length; i++) 
		{
			fileContainer = filesArray[i];
			if(!fileContainer.isUploaded())
			{
				container.appendChild(fileContainer.getContent());
			}
		}
	};

	var isFileSelected =function()
	{
		var isFileSelected = false;
		if (filesArray.length > 0) 
	  	{
			isFileSelected = true;
	  	}
		return isFileSelected; 
	};	
	
	var clearDisplayBox = function()
	{
		displayBox.innerHTML = '';
	};
	var sendFile = function(fileContainer) 
	{		
		if(!fileContainer.isNameInputEmpty() && !fileContainer.isDescriptionInputEmpty())
		{		
			var uri = "PHP/ImageServerUploader.php";
            var xhr = new XMLHttpRequest();
            var fileData = new FormData();
			
            fileContainer.getNameInput().style.border = "1px solid white";
			fileContainer.getDescriptionInput().style.border = "1px solid white";
			
            xhr.open("POST", uri, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle response.
					 
                    if(xhr.responseText.length > 0)
					{
						fileContainer.getProgressBar().innerHTML = (xhr.responseText);
					} 
                }
            };
			
			xhr.upload.addEventListener("progress", function(e) 
			{
		  	  if (e.lengthComputable) 
				{
		  		  	var percentage = Math.round((e.loaded * 100) / e.total);
					if(percentage == 100)
					{
						fileContainer.setUploaded(true);
					}
					else
					{
						fileContainer.getProgressBar().innerHTML = percentage+'%';
					}
					if(percentage > 0)
					{
						var style = percentage+'%'+'100%';
						fileContainer.getProgressBar().style.backgroundSize = style;
					}
				}
			}, false);
	
            fileData.append('myFile', fileContainer.getFile());
			fileData.append('nameInput',fileContainer.getNameInput().value);
			fileData.append('descriptionInput',fileContainer.getDescriptionInput().value);
			
            // Initiate a multipart/form-data upload
            xhr.send(fileData);
		}
		else
		{
			alert("Plase fill in image's name and descript.");
			fileContainer.getNameInput().style.border = "1px solid red";
			fileContainer.getDescriptionInput().style.border = "1px solid red";
		}
	};
	var addEvents = function()
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
			addFilesToArray(fileInput.files);
			handleFiles(); 
		},false);
	};
	addEvents();
	
	//Methods (Public Functions)
	this.dropboxSetup = function (domID)
	{
		dropbox = document.getElementById(domID);
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
		function drop(e) 
		{
			e.stopPropagation();
			e.preventDefault();

			var dt = e.dataTransfer;
			var files = dt.files;
			addFilesToArray(files);
			handleFiles();          
		}
	};
	this.uploadFiles = function()
	{
		for(var i =0; i < filesArray.length; i++)
		{
			if(!filesArray[i].isUploaded())
			{
				sendFile(filesArray[i]);	
			}
		}
	};
}