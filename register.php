<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$restaurantname = $location = $cuisinename = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   // Get username & password
       $restaurantname = trim($_POST["RestaurantName"]);
       $location = trim($_POST["Location"]);  
       $cuisinename = trim($_POST["CuisineName"]);
      // $eventdate = trim($_POST["EventDate"]); 
       
   // Prepare an insert statement
   $sql = "INSERT INTO p_restaurant (restaurantname, location, cuisinename) VALUES (?, ?, ?)";
       
       // Use DB info in $link from config.php to construct MySQL message/command
       if($stmt = mysqli_prepare($link, $sql)){
 
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "sss", $param_restaurantname, $param_location, $param_cuisinename);
           
           // Set parameters
           $param_restaurantname = $restaurantname;
           $param_location = $location;
           $param_cuisinename = $cuisinename;
           
           // Attempt to EXECUTE the prepared statement
           mysqli_stmt_execute($stmt);            
 
           // Close statement
           mysqli_stmt_close($stmt);
           $message = "Restaurant has been added successfully!!!";
 
       } else {
                $message = "Problems with inserting to Database";            
       }
 
   // Close connection
   mysqli_close($link);
}
?>
 
<html>
<head>
   <title>Registration</title>
</head>
<body>
 
<?php echo $message; ?>
 
</body>
</html>