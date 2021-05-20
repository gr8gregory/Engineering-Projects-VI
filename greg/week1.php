<!DOCTYPE html>
<html>
	<head>
		<style>
			body {
				background-color: white;
				margin: 5%;
				padding-left: 5%;
				padding-right: 5%;}

			h1{
				color: black;
				font-family: Arial;
				font-size: 30px;}

			p{
				color: black;
                font-family: Arial;
                font-size: 18px;}

			a{
                color: blue;
                font-family: Arial;
                font-size: 18px;}
			ul{
                color: black;
                font-family: Arial;
                font-size: 18px;}
			li{
                color: black;
                font-family: Arial;
                font-size: 18px;}
			img{
                padding-left: 1%;
				width: 300px;
				height: 386px;}
		</style>
	</head>
	<body>


	<! This is where you input the title of your logbook entry >
	<h1>Week 1 Logbook Entry</h1>
	
	<ul>
		<li>
			One of the tasks I completed was I had built a framework to use the logbook on the website of the remote server.
			The framework consists of a main menu page that holds links to all of the seperate pages to each logbook entry per week.
			The framework I created is very barebones and contains a portion of CSS to style the entrys so everything looks better than standard CSS. 
			I also created a template that both Caleb and Andrew have in their posession to copy and paste to speed up the time to have all the logbooks with the same look and feel.
		</li>
		<br>
		<li>
			Created an about.html page which is our projects home website that is used as a main menu for the project. 
			At the moment the about.html menu holds basic information and contains links to each members logbook menu.
		</li>
		<br>
		<li>
			Created a git repository that is currently linked to /var/www/html/ on the raspberry pi so the repository is being pushed to, we just have to do some simple commands to 
			pull all of the work onto the working directory to be hosted. On my computers end, I have a development directory that I pull from the git hub repository and copy the files out of the 
			directory and into my own personal web hosting directory under /var/www/html/ where I can do development and see changes before I push onto the raspberry pi.
		</li>
		<br>
		<li>
			Able to connect and control the elevator by the program that exists currently and was able to verify its operation by watching the stream over vlc to verify the operation and
			connectivity to ensure that there was no issues at the current moment with the raspberry pi.
		</li>

		<br>
		<li>
			Helped adrew with the test plan of the raspberry pi connectivity by investigating the simple curl command to verify that we have access to the raspberry pi through linux. 
		</li>
		</br>
		<li>
			Began to think of a design for the UI. Here is an image of a quick drawing of a prototype for the layout for the elevator. 
			<br>
			<img src="UI-Drawing.jpg" alt="Simple sketch of the UI for the elevator">
		</li>
	</ul>
	
	<p>
		<a href="https://github.com/gr8gregory/Engineering-Projects-VI-website">Github Repository Link</a>
		<br>
		<br>
		<a href="http://142.156.193.130:50000/greg/logbook.php"> Return to Logbook Menu </a>
	</p>

	</body>
</html>

