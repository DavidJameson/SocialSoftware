//when document is fully loaded (Jquery))
//create an instance of FileUploader
$(document).ready(function()
{
	var fileInput = document.getElementById("fileInput");
	var fileSelect = document.getElementById("fileSelect");
	var displayBox = document.getElementById('fileList');
	var sendButton = document.getElementById('send');
	
	var fileUploader = new FileUploader(fileInput,fileSelect,fileList);
			
	fileUploader.dropboxSetup('dropbox');	
	
	sendButton.addEventListener("click", function (e) 
	{
	  fileUploader.uploadFiles();
	  e.preventDefault(); // prevent navigation to "#"
	}, false);
});



    
