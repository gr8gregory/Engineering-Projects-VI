<?php
	
	function update_elevatorNetwork(int $node_ID, int $new_floor =1): int {
		$db1 = new PDO('mysql:host=127.0.0.1;dbname=elevator','ese','ese');
		$query = 'UPDATE elevatorNetwork 
				SET currentFloor = :floor
				WHERE nodeID = :id';
		$statement = $db1->prepare($query);
		$statement->bindvalue('floor', $new_floor);
		$statement->bindvalue('id', $node_ID);
		$statement->execute();	
		
		return $new_floor;
	}
?>
<?php 
	function get_currentFloor(): int {
		try { $db = new PDO('mysql:host=127.0.0.1;dbname=elevator','ese','ese');}
		catch (PDOException $e){echo $e->getMessage();}

			// Query the database to display current floor
			$rows = $db->query('SELECT currentFloor FROM elevatorNetwork');
			foreach ($rows as $row) {
				$current_floor = $row[0];
			}
			return $current_floor;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link href='css/gui.css' type='text/css' rel='stylesheet'/> 
		<link href='css/menu.css' type='text/css' rel='stylesheet'/> 
		<title>Graphical User Interface</title>
	</head>

	<body>
	
		<div class='div1'>
			<ul class='h_menu'>
                <li class='index'><a class='menu' href="/index.html"><b>Main Menu</b></a></li>
				<li class='gui'><a class='menu' href="/gui.php"><b>Elevator Control</b></a></li>
				<li class='about'><a class='menu' href="/about.html"><b>About the team</b></a></li>
				<li class='project'><a class='menu' href="/projectplan.html"><b>Project Plan</b></a></li>
				<li class='video'><a class='menu' href="/video.html"><b>Video Demonstration</b></a></li>
			</ul class='h_menu'>
		</div>

		<?php 
			// When the "GO" button is pressed, it sends the value of the new floor the user want to the elevator network. 
			// and it then refreshes the page and re-loads.
			if(isset($_POST['newfloor'])) {
				$curFlr = update_elevatorNetwork(1, $_POST['newfloor']); 
				header('Refresh:0; url=gui.php');	
			} 
			$curFlr = get_currentFloor();
			echo "<h2>Current floor # $curFlr </h2>";			
		?>		
		
		<h2> 	
			<form action="gui.php" method="POST">
				<img src="Button_Not_Pressed.png" class="Button_no"width="174" height="286">
				<img src="Indicator_1_Down.png" class="indc_1D"width="656" height="173">
				
				<?php
				/*<img src="Button_Pressed_Down.png" class="Button_down"width="174" height="286">
				<img src="Button_Pressed_Up.png" class="Button_up"width="174" height="286">
				
				<img src="Indicator_1_up.png" class="indc_1U"width="656" height="173">
				<img src="Indicator_2_Down.png" class="indc_2D"width="656" height="173">
				<img src="Indicator_2_up.png" class="indc_2U"width="656" height="173">
				<img src="Indicator_3_Down.png" class="indc_3D"width="656" height="173">
				<img src="Indicator_3_up.png" class="indc_3U"width="656" height="173">*/
				?>
			</form>
		</h2>

		<p><a href="/index.html"> Return </a></p>
		</body>
		
</html>
 
 