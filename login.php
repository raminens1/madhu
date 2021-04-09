<?php
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$restaurantname = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
       $restaurantname = trim($_POST["RestaurantName"]);
 
   // Validate credentials
 
       // Prepare a select statement
       $sql = "SELECT id, restaurantname, location, cuisinename FROM p_restaurant WHERE restaurantname = ?";
       
       if($stmt = mysqli_prepare($link, $sql)){
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "s", $param_restaurantname);
           
           // Set parameters
           $param_restaurantname = $restaurantname;
           
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
               // Store result
               mysqli_stmt_store_result($stmt);
               
               // Check if username exists, if yes then verify password
               if(mysqli_stmt_num_rows($stmt) == 1){                    
                   // Bind result variables
                   mysqli_stmt_bind_result($stmt, $id, $restaurantname, $location, $cuisinename);
                   if(mysqli_stmt_fetch($stmt)){
                           // Password is correct Display a message that it's OK
                           $message = "The Restaurant is located in ". $location  ;
 
                   }
               } else{
                   // Display an error message if username doesn't exist
                   $message = "No Restaurant found with that Name.";
               }          
           }
 
           // Close statement
           mysqli_stmt_close($stmt);
       }
   
   // Close connection
   mysqli_close($link);
}
?>
 
<html>
<head>
   <title>Login</title>
</head>
<body>
 
<?php echo $message; ?>
 
</body>
</html>