//when document is fully loaded (Jquery))
//add event listeners
$(document).ready(function()
{
	window.URL = window.URL || window.webkitURL;
	
	var fileSelect = document.getElementById("fileSelect");
	var fileInput = document.getElementById("fileInput");
	var fileList = document.getElementById('fileList');
	
	fileInput.addEventListener("change",function (e)
	{
		handleFiles(fileInput.files);
	},false);
	
	fileSelect.addEventListener("click", function (e) 
	{
	  if (fileInput) 
	  {
	    fileInput.click();
	  }
	  e.preventDefault(); // prevent navigation to "#"
	}, false);
	
		
});
//Display preview of files to be uploaded
function handleFiles(files) {
  if (!files.length) {
    fileList.innerHTML = "<p>No files selected!</p>";
  } else {
  	fileList.innerHTML = '';
    var list = document.createElement("ul");
    for (var i = 0; i < files.length; i++) {
      var li = document.createElement("li");
      list.appendChild(li);
      
      var img = document.createElement("img");
      img.src = window.URL.createObjectURL(files[i]);
      img.height = 60;
      img.onload = function(e) {
        window.URL.revokeObjectURL(this.src);
      }
      li.appendChild(img);
      
      var info = document.createElement("span");
      info.innerHTML = files[i].name + ": " + files[i].size + " bytes";
      li.appendChild(info);
    }
    fileList.appendChild(list);
  }
}
//using Jquery
function readMultipleURL(input)
{
	var length = input.files.length;
	
	if(length > 0)
	{
		$('#blah').text('');
		for(var i = 0; i < length; i++)
		{
			var reader = new FileReader();
			
			reader.onload = function(e)
			{
				var src = e.target.result;
				var width = 100;
				var height = 100;
				var tag = "<img class='images' src='"+src+"' width="+width+"height="+height+"/>";
				//$('#blah').replaceWith(tag);
				$('#blah').append(tag);
			}
			reader.readAsDataURL(input.files[i]);
		}
		return true;
	}
	else
	{
		return false;
	}
}
//using Javascript alone
function getFile()
{
	var selected_file = document.getElementById('input').files[0];
	
	//var reader = new FileReader();
	/*
	reader.onload = function(e)
	{
		var src = e.target.result;
		alert(src);
	}
	
	reader.readAsDataURL(selected_file);*/
}



    
