// Print copyright symbol and current year for all copyright elements

var date = new Date();
var copyright = document.getElementsByClassName("copyright");

for (var i = copyright.length - 1; i >= 0; i--)
{
	copyright[i].innerHTML = "&copy " + date.getFullYear();
}



// Print current age of each team member
var bDates = {"andrew":  new Date("1234-5-20"), "caleb": new Date("2000-5-31"), "greg": new Date("2000-3-26")};

function calculateAge(bDate)
{
	diff = Date.now() - bDate.getTime();
	age_full = new Date(diff);
	age_year = age_full.getFullYear() - 1970;    // Subtract epoch year since all dates are offset from it
	return "Age: " + age_year;
}

document.getElementById('gregAge').innerHTML = calculateAge(bDates["greg"]);
document.getElementById('calebAge').innerHTML = calculateAge(bDates["caleb"]);
document.getElementById('andrewAge').innerHTML = calculateAge(bDates["andrew"]);

