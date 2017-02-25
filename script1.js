var notType = document.getElementById("notType");

var catType = document.getElementById("catType");

var chkbox = document.getElementById("chkbox");

var topic = document.getElementById("topic");

var comm = document.getElementById("comm");

var submFile = document.getElementById("subFile");


function validateForm()
{
	if (notType.value == "" )
		{
		alert("Pease select a type of notice");
		}

	else if ( catType.value == "" )
		{
		alert("Please select the category it belongs to");
		}

	else if ( chkbox.value == "" )
		{
			alert("Please select at least one of the checkbox");
		}

	else if ( topic.value == "" )
		{
	 	alert("Please state the subject for the post");
	 	}

	 else if ( comm.value == "")
	  	{
	  	alert("Please provide the comment");
	  	}

	 else{}

}







