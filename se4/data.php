<?php

function get_restaurant($locationname, $restaurantname)
{
        /* Database INFO */
	$servername = "localhost";
	$username = "raminens1";
	$password = "yrs96p";
	$dbname = "raminens1_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
       }

       $sql = "SELECT restaurantname FROM p_restaurant WHERE location = '$locationname'";
       $result = $conn->query($sql);

        if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                      $p = $row["restaurantname"];
      }
    } else {
                     $p = null;
        }

    $conn->close();

if ($p == $restaurantname) 
  {
    return "true";
  }
else 
 {
  return "false";

 }

}

?>
