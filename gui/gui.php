	<?php
		// Initialize the session
		session_start();
		
		// Check if user is not logged in, if not redirect to the login page. 
		if($_SESSION["loggedin"] != true){
			$_SESSION['message'] = 'message';
			header("location: /login.php");
			exit;
		}

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
	?>

	<!DOCTYPE html>
	<html>
		<head>
			<link href='/css/gui.css' type='text/css' rel='stylesheet'/> 
			<link href='/css/navi.css' type='text/css' rel='stylesheet'/> 
			<title>Graphical User Interface</title>
			<script src="gui.js" type="text/javascript"></script>

			<meta name='robots' content='noindex nofollow' />
	


	<!--bootstrap links: https://getbootstrap.com/docs/5.0/getting-started/introduction/-->

	<!--BOOTstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<!--Bootstrap JS code-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
		crossorigin="anonymous"></script>

	<link href='css/projectplan.css' type='text/css' rel='stylesheet' />
	<link href='css/navi.css' type='text/css' rel='stylesheet' />
	<!--[if lt IE 9]>
            <script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script>
        <![endif]-->
		</head>

		<body>
		<header class="p-3 bg-dark text-white">
		<div class="container">
		  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			<a href="./" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
				<img class="meme" role="img"  src="/andrew/tenor.gif" alt="Part Parrot" >
			 
			</a>
	
			<ul class="nav gap-1 col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-1">
			  <li><a href="../menu.html" class="nav-link px-2 text-secondary">Home</a></li>
			  <li><a href="/gui/gui.php" class="nav-link px-2 text-white">Elevator</a></li>
			  <li><a href="../projectplan.html" class="nav-link px-2 text-white">Project Plan</a></li>
			  <li><a href="../video.html" class="nav-link px-2 text-white">Demo</a></li>
			  <li><a href="../about.html" class="nav-link px-2 text-white">About</a></li>

			
			</ul>
	
			<form class="col-14 col-lg-auto mb-3 mb-lg-0 me-lg-3">
			  <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
			</form>
	
			<div class="text-end">
			  <a type="button" href="./login.php" class="btn btn-outline-light me-2">Login</a>
			  <a type="button" href="./logout.php" class="btn btn-warning">Logout</a>
			</div>

			<div class="text-end">
				<p id="time"class="nav-link px-2 text-white"></p>
				<script src="js/dateTime.js"></script>
			</div>
		  </div>
		</div>
	  </header>
		

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

				if(isset($_GET['id'])) {
					if($_GET['value']=="1" || $_GET['value']=="2" || $_GET['value']=="3"){
						$curFlr = update_elevatorNetwork(1, $_GET['value']); 
						header('Refresh:0; url=gui.php');
					}
						
				} 
				$curFlr = get_currentFloor();
				if($curFlr == 1){
					echo "<img src='img/Indicator_1_up.png' class='indc_NO' id='floor'>";
				}
				else if($curFlr == 2){
					echo "<img src='img/Indicator_2_up.png' class='indc_NO' id='floor'>";;
				}
				else if($curFlr == 3){
					echo "<img src='img/Indicator_3_up.png' class='indc_NO' id='floor'>";
				}
				else{
					echo "<img src='img/Indicator_No_Floor.png' class='indc_NO' id='floor'>";
				}
						
				//echo "<h2>Current floor # $curFlr </h2>";
				
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
								break;
							case "21":
								echo "Floor 2 Button has been pressed";
								break;
							case "31":
								echo "Floor 3 Button has been pressed";
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
					<?php //<iframe class='stream' src="http://192.168.0.201:5080/" ></iframe>?>

					<script type="text/javascript">
						imginit();
					</script>

				</form>
			</h2> 
		</body>
			
	</html>
	
	

