	<?php

		// Initialize the session
		//session_start();
		
		// Check if user is not logged in, if not redirect to the login page. 
		/*if($_SESSION["loggedin"] != true){
			$_SESSION['message'] = 'message';
			header("location: /login.php");
			exit;
		}*/
		
	?>

	<?php
		
		/*function update_elevatorNetwork(int $node_ID, int $status): int {
			$db1 = new PDO('mysql:host=127.0.0.1;dbname=elevator','ese','ese');
			$query = 'UPDATE elevatorNetwork 
					SET requestedFloor = :floor
					WHERE nodeID = :id';
			$statement = $db1->prepare($query);
			$statement->bindvalue('floor', $new_floor);
			$statement->bindvalue('id', $node_ID);
			$statement->execute();	
			
			return $new_floor;
		}*/

		function insert_elevatorNetwork_webreq(int $node_ID, int $stat, int $flr): int { // NODEID, STATUS, FLOOR
			try { $db1 = new PDO('mysql:host=127.0.0.1;dbname=elevator','ese','ese');}
			catch (PDOException $e){echo $e->getMessage();}

			$query = 'INSERT INTO elevatorNetwork (nodeID, status, floor) VALUES (?,?,?)';
			$statement = $db1->prepare($query);
			$statement->execute([$node_ID, $stat, $flr]);	
			return $flr;
		}

	?>
	<?php 
		/* Old get floor function
		function get_currentFloor(): int {
			try { $db = new PDO('mysql:host=127.0.0.1;dbname=elevator','ese','ese');}
			catch (PDOException $e){echo $e->getMessage();}

				// Query the database to display current floor
				$rows = $db->query('SELECT currentFloor FROM elevatorNetwork');
				foreach ($rows as $row) {
					$current_floor = $row[0];
				}
				return $current_floor;
		}*/

		function get_Floor(): int {
			try { $db = new PDO('mysql:host=127.0.0.1;dbname=elevator','ese','ese');}
			catch (PDOException $e){echo $e->getMessage();}
				$requested_floor = 0;
				// Query the database to display current floor
				$rows = $db->query('SELECT floor FROM elevatorNetwork WHERE status = 2');
				if (is_array($rows) || is_object($rows)){	
					foreach ($rows as $row) {
						$requested_floor = $row[0];
					}
					return $requested_floor;
				}
				else{
					return -1;
				}
				
		}

		function get_move_Floor(): int {
			try { $db = new PDO('mysql:host=127.0.0.1;dbname=elevator','ese','ese');}
			catch (PDOException $e){echo $e->getMessage();}
				$requested_floor = 0;
				// Query the database to display current floor
				$rows = $db->query('SELECT floor FROM elevatorNetwork WHERE status = 1'); // Recieves the direction of the elevator moving. 
				if (is_array($rows) || is_object($rows)){	
					foreach ($rows as $row) {
						$requested_floor = $row[0];
					}
					return $requested_floor;
				}
				else{
					return -1;
				}
		}

		function IndcStatus(){
			try { 
				$db = new PDO('mysql:host=127.0.0.1;dbname=elevator','ese','ese');
				$query = 'SELECT nodeID, floor, status FROM elevatorNetwork'; 
				$stmt = $db->prepare($query);
				$stmt->execute();
				$result = $stmt->FetchAll(PDO::FETCH_ASSOC);
				$stat['1']='0';
				$stat['2']='0';
				$stat['3']='0';
				$stat['4']='0';
				$stat['5']='0';
				$stat['6']='0';
				$stat['7']='0';

				foreach( $result as $row){
					if($row['nodeID'] == 1){
						$stat['1']='1';
					}
					if($row['nodeID'] == 2 && $row['floor']== 4){
						$stat['2']='2';
					}
					if($row['nodeID'] == 2 && $row['floor']== 5){
						$stat['3']='2';
					}
					if($row['nodeID'] == 3){
						$stat['4']='3';
					}
					if($row['nodeID']== 0 && ($row['status']!=2) && $row['floor']==1){
						$stat['5']='1';
					}
					if($row['nodeID']== 0 && ($row['status']!=2) && $row['floor']==2){
						$stat['6']='2';
					}
					if($row['nodeID']== 0 && ($row['status']!=2) && $row['floor']==3){
						$stat['7']='3';
					}
				}
				return $stat; 
				
			}
			catch (PDOException $e){echo $e->getMessage();}	
		}

	?>

	<!DOCTYPE html>
	<html>
		<head>
			
			<title>Graphical User Interface</title>
			<meta name='description' content='Page in project' />
			<meta name='robots' content='noindex nofollow' />
			<meta charset="utf-8"/>
			<meta name="viewport" content="width=device-width, inital-scale=1"/>
			<meta http-equiv='author' content='ghuras' />
			<meta http-equiv='author' content='choeksema' />
			<meta http-equiv='author' content='asammut' />
			<meta http-equiv='pragma' content='no-cache' />

			<link href='/css/gui.css' type='text/css' rel='stylesheet' />
			<link href='/css/menu.css' type='text/css' rel='stylesheet' />
			<link href='/css/navi.css' type='text/css' rel='stylesheet' />
			<script src="gui.js" type="text/javascript"></script>

			<!--BOOTstrap-->
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
				integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
			<!--Bootstrap JS code-->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
				crossorigin="anonymous"></script>

				<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
				<link href="/css/heroes.css" rel="stylesheet">
				

			<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
				font-size: 3.5rem;
				}
			}
			</style>
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
                      <li><a href="/menu.html" class="nav-link px-2 text-secondary">Home</a></li>
                      <li><a href="/gui/gui.php" class="nav-link px-2 text-white">Elevator</a></li>
                      <li><a href="/projectplan.html" class="nav-link px-2 text-white">Project Plan</a></li>
                      <li><a href="/video.html" class="nav-link px-2 text-white">Demo</a></li>
                      <li><a href="/about.html" class="nav-link px-2 text-white">About</a></li>
        
                    
                    </ul>
            
                    <form class="col-14 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                      <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                    </form>
            
                    <div class="text-end">
                        <a type="button" href="/login.php" class="btn btn-outline-light me-2">Login</a>
                        <a type="button" href="/logout.php" class="btn btn-warning">Logout</a>
                    </div>
        
                    <div class="text-end">
                        <p id="time"class="nav-link px-2 text-white"></p>
                        <script src="/js/dateTime.js"></script>
                    </div>
                  </div>
                </div>
            </header>

			<?php 
				$flr = get_Floor();
				$move = get_move_Floor();
				


				if($flr == 1 || $move==5){
					echo "<img src='img/Indicator_1_up.png' class='indc_NO' id='floor'>";
				}
				else if($flr == 1 || $move==4){
					echo "<img src='img/Indicator_1_down.png' class='indc_NO' id='floor'>";
				}
				else if($flr == 2 || $move==5){
					echo "<img src='img/Indicator_2_up.png' class='indc_NO' id='floor'>";
				}
				else if($flr == 2 || $move==4){
					echo "<img src='img/Indicator_2_down.png' class='indc_NO' id='floor'>";
				}
				else if($flr == 3 || $move==5){
					echo "<img src='img/Indicator_3_up.png' class='indc_NO' id='floor'>";
				}
				else if($flr == 3 || $move==4){
					echo "<img src='img/Indicator_3_down.png' class='indc_NO' id='floor'>";
				}
				else{
					echo "<img src='img/Indicator_No_Floor.png' class='indc_NO' id='floor'>";
				}
						
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
								$insert = insert_elevatorNetwork_webreq(0, 0, 1); 
								header('Refresh:0; url=gui.php');
								break;
							case "21":
								echo "Floor 2 Button has been pressed";
								$insert = insert_elevatorNetwork_webreq(0, 0, 2);
								header('Refresh:0; url=gui.php');
								break;
							case "31":
								echo "Floor 3 Button has been pressed";
								$insert = insert_elevatorNetwork_webreq(0, 0, 3); 
								header('Refresh:0; url=gui.php');
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
				

				
			
			function audio(int $flag){
                if($flag == 1){
					echo "<script> 
					var audio = new Audio('./audio/up.mp3');
 					audio.play();
 					</script>";
				}
				if($flag == 2){
					echo "<script>
					var audio = new Audio('./audio/down.mp3');
					audio.play();
					</script>";
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
			
					<a href="gui.php"><img src="./img/panel/alarm_lit_up.png" class="mapA" id="A"></a>
					<a href="gui.php"><img src="./img/panel/button_1_lit_up.png" class="map1" id="one"></a>
					<a href="gui.php"><img src="./img/panel/button_2_lit_up.png" class="map2" id="two"></a>
					<a href="gui.php"><img src="./img/panel/button_3_lit_up.png" class="map3" id="three"></a>
					<a href="gui.php"><img src="./img/panel/close_light_up.png" class="mapC" id="C"></a>
					<a href="gui.php"><img src="./img/panel/fan_lit_up.png" class="mapF" id="F"></a>
					<a href="gui.php"><img src="./img/panel/open_lit_up.png" class="mapO" id="O"></a>

	
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
					<?php


						$stat = IndcStatus();
				
						$oneStat = $U2Stat = $D2Stat = $threeStat = 1;
						
						if($stat['1'] == '0'){
							echo '<script type="text/javascript">CU_reset();</script>';
							$oneStat = 0;
						}
						if($stat['2'] == '0'){
							echo '<script type="text/javascript">CUD_D_reset();</script>';
							$D2Stat = 0;
						}
						if($stat['3'] == '0'){
							echo '<script type="text/javascript">CUD_U_reset();</script>';
							$U2Stat = 0;
						}
						if($stat['4'] == '0'){
							echo '<script type="text/javascript">CD_reset();</script>';
							$threeStat = 0;
						}
						if($stat['5'] == '0'){
							echo '<script type="text/javascript">I1_reset();</script>';
						}
						if($stat['6'] == '0'){
							echo '<script type="text/javascript">I2_reset();</script>';
						}
						if($stat['7'] == '0'){
							echo '<script type="text/javascript">I3_reset();</script>';
						}

						if(isset($_GET['id'])){
							if($_GET['id']=='D'){
								switch($_GET['value']){
									case "1":
										echo "1 Calling To go Up";
										$insert = insert_elevatorNetwork_webreq(1, 0, 5); 
										
										if($oneStat == 0){ // Meaning the indicator is off. 
											audio(1);
										}
										
										break;
									case "2U":
										echo "2 Calling To go Up";
										$insert = insert_elevatorNetwork_webreq(2, 0, 5); 
										
										if($U2Stat == 0){
											audio(1);
										}
		
										break;
									case "2D":
										echo "2 Calling To go Down";
										$insert = insert_elevatorNetwork_webreq(2, 0, 4); 
										
										if($D2Stat == 0){
											audio(2);
										}
		
										break;
									case "3":
										echo "3 Calling To go Down";
										$insert = insert_elevatorNetwork_webreq(3, 0, 4); 
										
										if($threeStat == 0){
											audio(2);
										}
		
										break;
									default:
										echo "";
								}
							}
						}

					?>
					<script type="text/javascript">
						imginit();
					</script>

					<audio id='down'>
						<source src="./audio/down.mp3">
					</audio>
					<audio id='up'>
						<source src="./audio/up.mp3">
					</audio>
					<audio id='first'>
						<source src="./audio/first.mp3">
					</audio>
					<audio id='second'>
						<source src="./audio/second.mp3">
					</audio>
					<audio id='third'>
						<source src="./audio/third.mp3">
					</audio>

				</form>
			</h2> 
		</body>
			
	</html>
	
	

