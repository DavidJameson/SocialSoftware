function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		            
		reader.onload = function (e) {
			var src = e.target.result;
			var width = 150;
			var height = 150;
			var tag = "<img src='"+src+"' width="+width+"height="+height+"/>";
			$('#blah').replaceWith(tag);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
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
	}
}
    
