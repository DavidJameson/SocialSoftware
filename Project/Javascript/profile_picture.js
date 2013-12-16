$(document).ready(function()
{
	var fileInput = document.getElementById("fileInput");
	var fileSelect = document.getElementById("selectPic");
	var displayBox = document.getElementById('picPreview');
	var sendButton = document.getElementById('updatePic');
	
	var imageFileUploader = new ImageFileUploader(fileInput,fileSelect,displayBox,1,true);	
	
	sendButton.addEventListener("click", function (e) 
	{
	  imageFileUploader.uploadFiles();
	  e.preventDefault(); // prevent navigation to "#"
	}, false);
});

