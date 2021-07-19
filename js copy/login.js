// Deal with focus on loading
document.getElementById('user').focus();


// Deal with input checking
// Get elements
var loginForm = document.getElementById('login');
var username = document.getElementById('user');
var userFeedback = document.getElementById('userFeedback');
var password = document.getElementById('pass');
var passFeedback = document.getElementById('passFeedback');


// Functions
function lenUsername(e)
{
	if (username.value.length < 7)
	{
		userFeedback.innerHTML = "Must be at least 7 characters";
		e.preventDefault();
	}
	else
	{
		userFeedback.innerHTML = "";
	}
}

function lenPassword(e)
{
	if (password.value.length < 7)
	{
		passFeedback.innerHTML = "Must be at least 7 characters";
		e.preventDefault();
	}
	else
	{
		passFeedback.innerHTML = "";
	}
}

// Add event listener
loginForm.addEventListener('submit', function(e) {lenUsername(e); lenPassword(e);}, false);