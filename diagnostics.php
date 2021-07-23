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

    
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Video Demonstration</title>
		<meta name='description' content='Page in project'/>
        <meta name='robots' content='noindex nofollow'/>
        <meta http-equiv='author' content='ghuras'/>
        <meta http-equiv='author' content='choeksema'/>
		<meta http-equiv='author' content='asammut'/>
        <meta http-equiv='pragma' content='no-cache'/>

        <!--bootstrap links: https://getbootstrap.com/docs/5.0/getting-started/introduction/-->
        <!--BOOTstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <!--Bootstrap JS code-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

		<link href='css/font.css' type='text/css' rel='stylesheet'/>
        <link href='css/menu.css' type='text/css' rel='stylesheet'/>
        <link href='css/diagnostics.css' type='text/css' rel='stylesheet'/>
	</head>
	<body>
        <div id='page'>
            <header>
                <ul class='h_menu'>
                    <li class='index'><a class='menu' href="/menu.html"><b>Main Menu</b></a></li>
                    <li class='gui'><a class='menu' href="/gui/gui.php"><b>Elevator Control</b></a></li>
                    <li class='about'><a class='menu' href="/about.html"><b>About the team</b></a></li>
                    <li class='project'><a class='menu' href="/projectplan.html"><b>Project Plan</b></a></li>
                    <li class='video'><a class='menu' href="/video.html"><b>Video Demonstration</b></a></li>
                    <li class='logout'><a class='menu' href="/logout.php"><b>Logout</b></a></li>
                    <li class='login'><a class='menu' href="/login.php"><b>login</b></a></li>
                </ul class='h_menu'>
            </header>
            <br>
            <h1> Diagnostics Page</h1>
            <br>
            <iframe class="terminal" src="webconsole.php"></iframe>
            <hr>
            <div class='col'>
               
                <div class='col-xs-12 col-md-12'>
                    <h2>Users Database Content</h2>
                        <table>
                            <tr>
                                <th>id</th>
                                <th>username</th>
                                <th>Date Created</th>
                            </tr>
                            <?php
                                $sql = "SELECT * FROM users";
                                $result = $link->query($sql);
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row["username"] . "</td><td>" . $row["created_at"] . "</td></tr>";
                                    }
                                }
                            ?>
                        </table>
                    <br>
                </div>
                <div class='col-xs-12 col-md-12'>
                    <h2>elevatorNetwork Contents</h2>
                        <table>
                            <tr>
                                <th>date</th>
                                <th>time</th>
                                <th>nodeID</th>
                                <th>status</th>
                                <th>currentFloor</th>
                                <th>requestedFloor</th>
                                <th>otherInfo</th>
                            </tr>
                            <?php
                                $sql = "SELECT * FROM elevatorNetwork";
                                $result = $link->query($sql);
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<tr><td>" . $row['date'] . "</td><td>" . $row["time"] . "</td><td>" . $row["nodeID"] . "</td><td>" . $row['status'] . "</td><td>" . $row["currentFloor"] . "</td><td>" . $row["requestedFloor"] . "</td><td>" . $row["otherInfo"] . "</td></tr>";
                                    }
                                }
                            ?>
                        </table>
                    <br>
                </div>
		<hr>
                <div class='col-xs-12 col-md-12'>
                    <h2>CAN Messages</h2>
                    <br>
                </div>
                <hr>
                <div class='col-xs-12 col-md-12'>
                    <h2>CAN Statistics</h2>
                    <br>
                </div>
                <hr>
                <div class='col-xs-12 col-md-12'>
                    <h2>Unit Test</h2>
                    <br>
                </div>
                <hr>
            </div>
            <br>
            <div class='row'>
                <div class='col-xs-6 col-md-6'>
                    <h2>Displayed Eelvator Floor:</h2>
                    <br>
                </div>
                <div class='col-xs-6 col-md-6'>
                    <h2>Actual Elevator Floor Position:</h2>
                    <br>
            </div>

        </div>
        <p> Copyright &copy SmoothBrains</p>
    </body>
</html>

