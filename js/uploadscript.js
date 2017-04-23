var catType = document.getElementById("catType");

var topic = document.getElementById("topic");

var comment = document.getElementById("comm");

var subFile = document.getElementById("subFile");

var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];  

var dispAd = document.getElementById("dispAd");

function validateForm() 
{
	//checking if a category is selected
	if (catType.options[catType.selectedIndex].value; == "0" )
	{
		alert("Please select a category");
	}

	//checking if subject is filled
	if (topic.value == "")
	{
		alert("Subject not filled");
	}

	else 
	{
		//checking to see if number or symbols are present
		var temp = /[^a-zA-Z0-9]/;
		
		if (temp.test(topic.value)) 
		{
			alert("Subject cannot have symbols");
		}
	}

	//checking if comment is filled
	if (comment.value == "")
	{
		alert("Comment / description not filled");
	}

	//checking if the right file extention was uploaded
	if (subFile.type == "file") 
    {
        var subName = subFile.value;
    
        if (subName.length > 0) 
        {
            var validExtention = false;
            
            for (var j = 0; j < _validFileExtensions.length; j++) 
            {
                var sCurExtension = _validFileExtensions[j];

                if (subName.substr(subName.length - sCurExtension.length, 
                	sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) 
                {
                    validExtention = true;
                    
                }
            }
             
            if (!validExtention) {
                alert("Sorry, " + subName + " is an invalid file, you can only upload files with these extensions: " + 
                	_validFileExtensions.join(", "));
                subFile.value = "";
                
            }
        }
    }

	//checking if a category is selected
	if (dispAd.options[dispAd.selectedIndex].value; == "0" )
	{
		alert("Please select a display option");
	}
	
	else {}
}


var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    




