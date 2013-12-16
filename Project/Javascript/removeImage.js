function removeImage(image_id)
{
	//alert(image_id);
	var confirmation = confirm("Are you sure, you want to delete this picture?");
	if(confirmation)
	{
		sendImageId('POST','PHP/removeImage.php',image_id);
	}
}