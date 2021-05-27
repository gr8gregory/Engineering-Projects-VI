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
		<style>
			body {
				background-color: white;
				margin: 20px;}

			h1{
				color: black;
				margin-left: 60px;
				margin-top: 40px;
				padding-left: 20px;
				padding-right: 40px;
				font-family: Arial;
				font-size: 60px;}

			h1{
				color: black;
				margin-left: 60px;
				margin-top: 40px;
				padding-left: 20px;
				padding-right: 40px;
				font-family: Arial;
				font-size: 20px;}

			p{
				color: black;
				padding-left: 200px;
				padding-right: 200px;
                font-family: Arial;
                font-size: 18px;}

			a{
                color: blue;
                padding-left: 80px;
				padding-right: 100px;
                font-family: Arial;
                font-size: 18px;}

			ul{
                color: black;
                padding-left: 250px;
				padding-right: 200px;
                font-family: Arial;
                font-size: 18px;}
		</style>
	</head>


	<body>
	<h1>ESE Project VI Elevator</h1> 
	
		<?php 
			if(isset($_POST['newfloor'])) {
				$curFlr = update_elevatorNetwork(1, $_POST['newfloor']); 
				header('Refresh:0; url=index.php');	
			} 
			$curFlr = get_currentFloor();
			echo "<h2>Current floor # $curFlr </h2>";			
		?>		
		
		<h2> 	
			<form action="index.php" method="POST">
				Request floor # <input type="number" style="width:50px; height:40px" name="newfloor" max=3 min=1 required />
				<input type="submit" value="Go"/>
				<input type="submit" value=floor1/>
				<input type="submit" value=floor2/>
				<input type="submit" value=floor3/>
			</form>
		</h2>

		<p><a href="/about.html"> About Us </a></p>
		</body>
		
</html>
 
 
