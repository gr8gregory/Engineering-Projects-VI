	<?php
		// Initialize the session
		session_start();
		
		// Check if user is not logged in, if not redirect to the login page. 
		if($_SESSION["loggedin"] != true){
			$_SESSION['message'] = 'message';
			header("location: /login.php");
			exit;
		}
		// Include Config
		require_once "config.php";
		
	?>

	<?php
		
		function update_elevatorNetwork(int $node_ID, int $new_floor): int {
			$db1 = new PDO('mysql:host=127.0.0.1;dbname=elevator','ese','ese');
			$query = 'UPDATE elevatorNetwork 
					SET requestedFloor = :floor
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

		function get_requestedFloor(): int {
			try { $db = new PDO('mysql:host=127.0.0.1;dbname=elevator','ese','ese');}
			catch (PDOException $e){echo $e->getMessage();}

				// Query the database to display current floor
				$rows = $db->query('SELECT requestedFloor FROM elevatorNetwork');
				foreach ($rows as $row) {
					$requested_floor = $row[0];
				}
				return $requested_floor;
		}
	?>

	<!DOCTYPE html>
	<html>
		<head>
			<link href='/css/gui.css' type='text/css' rel='stylesheet'/> 
			<link href='/css/menu.css' type='text/css' rel='stylesheet'/> 
			<title>Graphical User Interface</title>
			<script src="gui.js" type="text/javascript"></script>
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
					<li class='login'><a class='menu' href="/login.php"><b>login</b></a></li>
				</ul class='h_menu'>
			</div>

			<?php 
				// When the "GO" button is pressed, it sends the value of the new floor the user want to the elevator network. 
				// and it then refreshes the page and re-loads.
				/*if(isset($_POST['newfloor'])) {
					$curFlr = update_elevatorNetwork(1, $_POST['newfloor']); 
					header('Refresh:0; url=gui.php');	
				} 
				$curFlr = get_currentFloor();
				echo $floor3;
				echo "<h2>Current floor # $curFlr </h2>";	*/

				$t=time();
				$date = date("Y-m-d",$t);
				$time = date("H-m-s",$t);

				$curFlr = get_currentFloor();
				$reqFlr = get_requestedFloor();

				if(isset($_GET['id'])) {
					if($_GET['value']=="1" || $_GET['value']=="2" || $_GET['value']=="3"){
						$curFlr = update_elevatorNetwork(1, $_GET['value']); 
						header('Refresh:0; url=gui.php');
					}
						
				} 
				
				if(($curFlr - $reqFlr) > 0){
					$dir = "D";
				}
				else{
					$dir = "U";
				}

				if($curFlr == 1 && $dir=="U"){
					echo "<img src='img/Indicator_1_up.png' class='indc_NO' id='floor'>";
				}
				else if($curFlr == 1 && $dir=="D"){
					echo "<img src='img/Indicator_1_down.png' class='indc_NO' id='floor'>";
				}
				else if($curFlr == 2 && $dir=="U"){
					echo "<img src='img/Indicator_2_up.png' class='indc_NO' id='floor'>";;
				}
				else if($curFlr == 2 && $dir=="D"){
					echo "<img src='img/Indicator_2_down.png' class='indc_NO' id='floor'>";
				}
				else if($curFlr == 3 && $dir=="U"){
					echo "<img src='img/Indicator_3_up.png' class='indc_NO' id='floor'>";
				}
				else if($curFlr == 3 && $dir=="D"){
					echo "<img src='img/Indicator_3_down.png' class='indc_NO' id='floor'>";
				}
				else{
					echo "<img src='img/Indicator_No_Floor.png' class='indc_NO' id='floor'>";
				}
						
				echo "<h2>Current floor # $curFlr </h2>";
				$sql = "INSERT INTO elevatorNetwork (date, time, nodeID, status, currentFloor, requestedFloor, otherInfo) VALUES('$date', '$time', '1', '1', '$curFlr', '2','test')";
				if(isset($_GET['id'])){
					if($_GET['id']=='I'){
						switch($_GET['value']){
							case "1":
								echo "Floor 1 Button has been un-pressed";
								break;
							case "2":
								echo "Floor 2 Button has been un-pressed";
								break;
							case "3":
								echo "Floor 3 Button has been un-pressed";
								break;
							case "C":
								echo "Closed door Button has been un-pressed";
								break;
							case "O":
								echo "Open door Button has been un-pressed";
								break;
							case "F":
								echo "Fan Button has been un-pressed";
								break;
							case "B":
								echo "Bell Button has been un-pressed";
								break;
							case "11":
								echo "Floor 1 Button has been pressed";
								$sql = "INSERT INTO elevatorNetwork (date, time, nodeID, status, currentFloor, requestedFloor, otherInfo) VALUES('$date', '$time', '1', '1', '$curFlr', '1','test')";
								break;
							case "21":
								echo "Floor 2 Button has been pressed";
								$sql = "INSERT INTO elevatorNetwork (date, time, nodeID, status, currentFloor, requestedFloor, otherInfo) VALUES('$date', '$time', '2', '1', '$curFlr', '2','test')";
								break;
							case "31":
								echo "Floor 3 Button has been pressed";
								$sql = "INSERT INTO elevatorNetwork (date, time, nodeID, status, currentFloor, requestedFloor, otherInfo) VALUES('$date', '$time', '3', '1', '$curFlr', '3','test')";
								break;
							case "C1":
								echo "Closed door Button has been pressed";
								break;
							case "O1":
								echo "Open door Button has been pressed";
								break;
							case "F1":
								echo "Fan Button has been pressed";
								break;
							case "B1":
								echo "Bell Button has been pressed";
								break;
							default:
								echo "";
						}
					}
				}

				if(isset($_GET['id'])){
					if($_GET['id']=='D'){
						switch($_GET['value']){
							case "1":
								echo "1 Calling To go Up";
								break;
							case "2U":
								echo "2 Calling To go Up";
								break;
							case "2D":
								echo "2 Calling To go Down";
								break;
							case "3":
								echo "3 Calling To go Down";
								break;
							default:
								echo "";
						}
					}
				}
			?>		
			
			<h2> 	
			<form action=gui.php method="GET">

					<img src="img/none_lit_up.png" class="I_NO" usemap="#I" id="INO">
					<map name="I">
						<area shape="circle" coords="125, 73, 30" onclick="myFunction_I3()" href="gui.php?id=I&value=31">
						<area shape="circle" coords="125, 157, 30" onclick="myFunction_I2()" href="gui.php?id=I&value=21">
						<area shape="circle" coords="125, 240, 30" onclick=" myFunction_I1()" href="gui.php?id=I&value=11">
						<area shape="circle" coords="78, 320,30" onclick="myFunction_IO()" href="gui.php?id=I&value=O1">
						<area shape="circle" coords="174, 320,30" onclick="myFunction_IC()" href="gui.php?id=I&value=C1">
						<area shape="circle" coords="78, 403, 30" onclick="myFunction_IF()" href="gui.php?id=I&value=F1">
						<area shape="circle" coords="174, 403, 30" onclick="myFunction_IB()" href="gui.php?id=I&value=B1">
					</map>
			
					<a href="gui.php?id=I&value=B"><img src="img/panel/alarm_lit_up.png" class="mapA" id="A" onclick="myFunction_IB()"></a>
					<a href="gui.php?id=I&value=1"><img src="img/panel/button_1_lit_up.png" class="map1" id="one" onclick=" myFunction_I1()"></a>
					<a href="gui.php?id=I&value=2"><img src="img/panel/button_2_lit_up.png" class="map2" id="two" onclick="myFunction_I2()"></a>
					<a href="gui.php?id=I&value=3"><img src="img/panel/button_3_lit_up.png" class="map3" id="three" onclick="myFunction_I3()"></a>
					<a href="gui.php?id=I&value=C"><img src="img/panel/close_light_up.png" class="mapC" id="C" onclick="myFunction_IC()"></a>
					<a href="gui.php?id=I&value=F"><img src="img/panel/fan_lit_up.png" class="mapF" id="F" onclick="myFunction_IF()"></a>
					<a href="gui.php?id=I&value=O"><img src="img/panel/open_lit_up.png" class="mapO" id="O" onclick="myFunction_IO()"></a>

	
					<h1 class="floor3">Floor 3</h1>
					<img src="img/CallButtonDown.png" class="C_D" usemap="#CD" id="CD">
					<map name="CD">
						<area shape="circle" coords="63, 117,36" onclick="myFunction_CD()" href="gui.php?id=D&value=3">
						
					</map>

					<h1 class="floor2">Floor 2</h1>
					<img src="img/CallButtonUpDown.png" class="C_UD" usemap="#CUD" id="CUD">
					<map name="CUD">
						<area shape="circle" coords="63, 64,36" onclick="myFunction_CUD_U()" href="gui.php?id=D&value=2U">
						<area shape="circle" coords="63, 169,36" onclick="myFunction_CUD_D()" href="gui.php?id=D&value=2D">
					</map>

					<h1 class="floor1">Floor 1</h1>
					<img src="img/CallButtonUp.png" class="C_U" usemap="#CU" id="CU">
					<map name="CU">
						<area shape="circle" coords="63, 117,36" onclick="myFunction_CU()" href="gui.php?id=D&value=1">
					</map>
					<?php //<iframe class='stream' src="http://192.168.0.201:5080/" ></iframe>?>

					<script type="text/javascript">
						imginit();
					</script>

				</form>
			</h2> 
		</body>
			
	</html>
	
	

