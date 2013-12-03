function FileUploader(fileInput,fileSelect,displayBox)
{
	this.fileInput = fileInput;
	this.fileSelect = fileSelect;
	this.displayBox = displayBox;
	var dropbox;
	var progressBar;
	
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
		function drop(e) 
		{
			e.stopPropagation();
			e.preventDefault();

			var dt = e.dataTransfer;
			var files = dt.files;
			
			handleFiles(files);          
		}
	};
	function sendFile(file) 
	{
			var uri = "PHP/serverUploader.php";
            var xhr = new XMLHttpRequest();
            var fd = new FormData();
            
            xhr.open("POST", uri, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle response.
                    //alert(xhr.responseText); // handle response.
                }
            };
			
			xhr.upload.addEventListener("progress", function(e) 
			{
		  	  if (e.lengthComputable) 
				{
		  		  	var percentage = Math.round((e.loaded * 100) / e.total);
					progressBar.innerHTML = percentage;
					alert(percentage);
				}
			}, true);
			
            fd.append('myFile', file);
            // Initiate a multipart/form-data upload
            xhr.send(fd);
	}
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
			for(var i =0; i < files.length; i++)
			{
				setTimeout(sendFile(files[i]),40000);
			}
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
		var container = document.createElement("div");
	    for (var i = 0; i < files.length; i++) 
		{
		    var content = document.createElement("div");
			content.className = "displayContent";
		    container.appendChild(content);
		      
		    var img = document.createElement("img");
			img.className = "images";
		    img.src = window.URL.createObjectURL(files[i]);
		    img.height = 60;
			  
		    img.onload = function(e) 
			{
		      window.URL.revokeObjectURL(this.src);
		    }
			  
		    content.appendChild(img);
		     
		    var info = document.createElement("span");
			info.className = "title";
		    info.innerHTML = files[i].name;
			content.appendChild(info);
			
			progressBar = document.createElement("span");
			progressBar.innerHTML = 0;
			info.className ="progressBar";
			content.appendChild(progressBar);
		    
		}
	    displayBox.appendChild(container);
	}
}