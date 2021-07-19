const MAX_CHARS = 180;

// Focus on the first element on the page
document.getElementById('fname').focus();


// Check that the user hasn't entered too many characters
var comments = document.getElementById('comments');
var charLeft = document.getElementById('charLeft');
var commentFeedback = document.getElementById('commentFeedback');
var submit = document.getElementById('submit');

function lenComments(e)
{
	let chars = MAX_CHARS - comments.value.length;

	if (chars < 0)
	{
		commentFeedback.innerHTML = "Character limit reached";
		submit.disabled = true;
		chars = 0;
	}
	else
	{
		commentFeedback.innerHTML = "";
		submit.disabled = false;
	}
	charLeft.innerHTML = "(" + chars + ")";
}

document.addEventListener('DOMContentLoaded', function(e) {lenComments(e);}, false);
document.addEventListener('keydown', function(e) {lenComments(e);}, false);



// Form validation
var fName = document.getElementById('fname');
var fNameFeedback = document.getElementById('fNameFeedback');
var lName = document.getElementById('lname');
var lNameFeedback = document.getElementById('lNameFeedback');
var email = document.getElementById('email');
var emailFeedback = document.getElementById('emailFeedback');
var faculty = document.getElementById('faculty');
var student = document.getElementById('student');
var requestTypeFeedback = document.getElementById('requestTypeFeedback');

function chkRequired(e)
{
	let error = false;
	let reqField = "Field required";
	fNameFeedback.innerHTML = "";
	lNameFeedback.innerHTML = "";
	emailFeedback.innerHTML = "";

	if (fName.value.length <= 0)
	{
		fNameFeedback.innerHTML = reqField;
		error = true;
	}

	if (lName.value.length <= 0)
	{
		lNameFeedback.innerHTML = reqField;
		error = true;
	}

	if (email.value.length <= 0)
	{
		emailFeedback.innerHTML = reqField;
		error = true;
	}

	if (!(faculty.checked || student.checked))
	{
		requestTypeFeedback.innerHTML = "Please select a request type";
		error = true;
	}

	if (error)
	{
		e.preventDefault();
	}
}

document.addEventListener('submit', function(e) {chkRequired(e)}, false);