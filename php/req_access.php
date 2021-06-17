<?php
$submitted = !empty($_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Access Request Handler</title>
	</head>
	<body>
		<fieldset>
			<legend>Contact information</legend>
			<div><label>Name: <?php 
				echo $_POST['firstname'] . " " . $_POST['lastname']; 
			?></label></div>
			<div><label>Email: <?php
				echo $_POST['email']; 
			?></label></div>
			<div><label>Website: <?php
				echo $_POST['url']; 
			?></label></div>
			<div><label>Birthday: <?php 
				echo $_POST['bdate']; 
			?></label></div>
			<div><label>User Type: <?php 
				echo $_POST['fac_or_student'] 
			?></label></div>
		</fieldset>

		<fieldset>
			<legend>Other Information</legend>
			<div><label><?php 
				foreach($_POST['involvement'] as $value)
				{
					switch ($value)
					{
						case 'none':
							echo 'You aren\'t involved in the project <br>';
							break;
						case 'instructor':
							echo 'You are an instructor for this project <br>';
							break;
						case 'instructor_other':
							echo 'You are an instructor for another project <br>';
							break;
						case 'student':
							echo 'You are student on this project <br>';
							break;
						case 'student_other':
							echo 'You are a college administrator <br>';
							break;
						case 'external':
							echo 'You are an external reviewer <br>';
							break;
						default:
							// Don't care
							break;
					} // switch
				} // foreach($_POST['involvement'] as $value)
			?></label></div>
			<div><label> You <?php
				if ($_POST['drives_car'] == "no_answer")
				{
					echo "might";
				}
				else if ($_POST['drives_car'] == "no")
				{
					echo "don't";
				}
			?> drive a car</label></div>
			<div><label><?php 
				if (isset($_POST['file_uploaded']))
				{
					echo "You selected file '<i>" . $_POST['file_uploaded'] . "</i>'";
				}
			?></label></div>
			<div><label><?php
				if (isset($_POST['comments']) && ($_POST['comments'] == "Please enter your comments here ..."))
				{
					echo "You entered no comment";
				}
				else if (isset($_POST['comments']) && ($_POST['comments'] == ""))
				{
					echo "You literally just emptied the box";
				}
				else
				{
					echo "Your comment: <br><p style=\"margin-left:10px\"><i>" . $_POST['comments'] . "</i></p>";
				}
			?></label></div>
		</fieldset>
		<a href="../request_access.html">Go Back</a>
	</body>
</html>