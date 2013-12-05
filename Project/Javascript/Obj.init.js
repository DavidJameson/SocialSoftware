//when document is fully loaded (Jquery))
//create an instance of FileUploader
$(document).ready(function()
{
	var fileInput = document.getElementById("fileInput");
	var fileSelect = document.getElementById("fileSelect");
	var displayBox = document.getElementById('fileList');
	var sendButton = document.getElementById('send');
	
	var imageFileUploader = new ImageFileUploader(fileInput,fileSelect,fileList);
			
	imageFileUploader.dropboxSetup('dropbox');	
	
	sendButton.addEventListener("click", function (e) 
	{
	  imageFileUploader.uploadFiles();
	  e.preventDefault(); // prevent navigation to "#"
	}, false);
});



    
