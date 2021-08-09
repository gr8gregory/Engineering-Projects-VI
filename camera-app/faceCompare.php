<?php

class faceCompare
{

   public $server = "127.0.0.1";
   public $username = "tester";
   public $password = "Password123$$";
   public $db = "face";
   private $mysqli;

    function connectToDatabase()
    {

        $this->mysqli = new mysqli($this->server, $this->username, $this->password, $this->db);

        if ($this->mysqli -> connect_errno) {
            die("Connection failed: " . mysqli_connect_error());
          }
          echo "Connected successfully";

        return;
    }

    function inDatabase($encoding, $tol)
    {
        
        $count = 0;
        $table;
        $enc_comp = (array) null;

        $sql = " select COUNT(*) FROM users";

        //Get the number of users tables in the db
        if ($result = $this->mysqli->query($sql))
        {
            $row = $result->fetch_array();
            $count = $row[0];

        }


        for($i = 0; $i < $count; $i++)
        {
            $sql = " SELECT tables FROM users WHERE id = $i";

            if ($result = $this->mysqli->query($sql))
            {
                $row = $result->fetch_array();
                $table = $row[0];
            }
            
            for($x = 0; $x < 127; $x++ )
            {
                $sql = " SELECT encdoing FROM $table WHERE id = $x";

                if ($result = $this->mysqli->query($sql))
                {
                    $row = $result->fetch_array();
                    $encoding = $row[0];
                    $result->free_result();

                }

                $enc_comp[$x] = $encoding;
            }


            $norm  = $this->euclid($encoding, $enc_comp);


            if($norm <= $tol)
            {
                return True;
            }

            $enc_comp = (array) null;

            return false;


        }
        
        return $username;
    }

    function addToDatabase($username, $encoding)
    {

        $count = 0;
        //Create a new table to hold all facial encodings
        $alter = "CREATE TABLE $username (id tinyint, encoding DOUBLE) ";

        if ($result = $this->mysqli->query($alter)) {
            //$result -> free_result();
          }
          $error = "Error description:" .  $this->mysqli->error;


        $sql = " select COUNT(*) FROM users";

        if ($result = $this->mysqli->query($sql))
        {
            $row = $result->fetch_array();
            $count = $row[0];

        }

        //Add user to list of known usres/tables
        $sql = "INSERT INTO users (id , tables) VALUES ($count ,'$username')";

        if ($result = $this->mysqli->query($sql)) {
            //$result -> free_result();
          }
          $error = "Error description:" .  $this->mysqli->error;



        for ($x  = 0; $x < 127; $x++ )
        {
            $num = $encoding[$x];
            $sql = "INSERT INTO $username (id, encoding) VALUES ($x ,$num)";
            if ($result = $this->mysqli->query($sql)) {
               // $result -> free_result();
              }
              $error = "Error description:" .  $this->mysqli->error;

        }
    }

    private function euclid($enc1, $enc2)
    {
        //Computer the euclidean distance of two arrays

        $sub_result= (array) null;
        $square_result=(array) null;
        $sum_result = 0;

        for($x = 0; $x < 127; $x++)
        {
            $sub_result[$x] = (double)$enc1[$x] - (double)$enc2[$x]; 
            $square_result[$x] = (double)$sub_result[$x] ** 2;
            $sum_result += (double) $square_result[$x];
        }

        $root_result = (double)sqrt($sum_result);

        return (double) $root_result;
    }


}


?>