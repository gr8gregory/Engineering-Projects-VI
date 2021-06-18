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
		<link href='/css/gui.css' type='text/css' rel='stylesheet'/> 
		<link href='/css/menu.css' type='text/css' rel='stylesheet'/> 
		<title>Graphical User Interface</title>
	</head>

	<body>
	
		<div class='div1'>
		<ul class='h_menu'>
                <li class='index'><a class='menu' href="/menu.html"><b>Main Menu</b></a></li>
				<li class='gui'><a class='menu' href="/gui/gui.php"><b>Elevator Control</b></a></li>
				<li class='about'><a class='menu' href="/about.html"><b>About the team</b></a></li>
				<li class='project'><a class='menu' href="/projectplan.html"><b>Project Plan</b></a></li>
				<li class='video'><a class='menu' href="/video.html"><b>Video Demonstration</b></a></li>
				<li class='logout'><a class='menu' href="/logout.php"><b>Logout</b></a></li>
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
			
			//echo "<h2>Current floor # $curFlr </h2>";			
		?>		
		
		<h2> 	
		<form action="gui.php" method="POST">
				<img src="img/Indicator_No_Floor.png" class="indc_NO">



				<img src="img/none_lit_up.png" class="I_NO" usemap="#I" id="INO">
                <map name="I">
					<area shape="circle" coords="125, 73, 30" onclick="myFunction_I3()">
                    <area shape="circle" coords="125, 157, 30" onclick="myFunction_I2()">
                    <area shape="circle" coords="125, 240, 30" onclick="myFunction_I1()">

                    <area shape="circle" coords="78, 320,30" onclick="myFunction_IC()">
                    <area shape="circle" coords="174, 320,30" onclick="myFunction_IO()">
                    <area shape="circle" coords="78, 403, 30" onclick="myFunction_IF()">
                    <area shape="circle" coords="174, 403, 30" onclick="myFunction_IB()">
				</map>



				<h1 class="floor3">Floor 3</h1>
				<img src="img/CallButtonDown.png" class="C_D" usemap="#CD" id="CD">
				<map name="CD">
					<area shape="circle" coords="63, 117,36" onclick="myFunction_CD()">
                    
				</map>

				<h1 class="floor2">Floor 2</h1>
				<img src="img/CallButtonUpDown.png" class="C_UD" usemap="#CUD" id="CUD">
				<map name="CUD">
					<area shape="circle" coords="63, 64,36" onclick="myFunction_CUD_U()">
					<area shape="circle" coords="63, 169,36" onclick="myFunction_CUD_D()">
				</map>

				<h1 class="floor1">Floor 1</h1>
				<img src="img/CallButtonUp.png" class="C_U" usemap="#CU" id="CU">
				<map name="CU">
					<area shape="circle" coords="63, 117,36" onclick="myFunction_CU()">
				</map>
				
				<iframe class='stream' src="http://192.168.0.201:5080/" ></iframe>
				
				<script src="gui.js"></script>

			</form>
		</h2> 
	</body>
		</h2> 
	</body>
		
</html>
 
 
