function ProfileEvents()
{
	var global;
	var myprofile;
	var upload;
	var settings;
	var logout;
	
	var content;
	
	var addEvents = function()
	{
		upload.addEventListener("click", function (e) 
		{
		  if (fileInput) 
		  {
		    fileInput.click();
		  }
		  e.preventDefault(); // prevent navigation to "#"
		}, false);
		
	};
}