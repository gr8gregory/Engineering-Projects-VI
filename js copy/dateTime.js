var dateTime = document.getElementById("time");

const months = new Array("January", "February", "March", "April", "May", "June", 
				"July", "August", "September", "October", "November", "December");

var today = new Date(Date.now());
var date = months[today.getMonth()] + " " + today.getDate() + ", " + today.getFullYear();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
dateTime.innerHTML = time + " " + date;

window.setInterval(setTimeDate, 1000);

function setTimeDate()
{
	var dateTime = document.getElementById("time");
	var today = new Date(Date.now());
	var date = months[today.getMonth()] + " " + today.getDate() + ", " + today.getFullYear();
	var hours = today.getHours();
	var minutes = today.getMinutes();
	var seconds = today.getSeconds();
	var time = ((hours<10)?"0":"") + hours + ":" + ((minutes<10)?"0":"") + minutes + ":" + ((seconds<10)?"0":"") + seconds;

	dateTime.innerHTML = time + " " + date;
}