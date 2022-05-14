<!DOCTYPE html> 
<html> 
      
<head> 
    <title> 
        IoT Payment Gateway- Get txn Details
    </title> 

<!-- include the style sheet file-->      
<link rel="stylesheet" href="css/style.css">

</head> 
  
<body> 

<?php
error_reporting(0);
// include Database configuration file
include 'config/db.php';

// Create database connection object
$data = new Databases;

  echo "<table border='1'>";
  echo "<tr><th colspan='5'>IoT Payment App- IDRBT</th></tr>";
  echo "<tr><th>Txn_id</th><th>Payload</th><th>Txn_Date</th><th>Initiated From</th><th>Approve/Decline</th></tr>";
  
  // output data of each row
  $post_data = $data->select('json_data');  
  foreach($post_data as $post)  
  { 
    $jsonArray = json_decode($post["data2"],true);
    echo "<tr>";
    echo "<td>".$post["id"]."</td>";
    echo "<td>".base64_decode($jsonArray["payload"])."</td>";
    echo "<td>".$post["created_on"]."</td>";
    echo "<td>".$post["ip"]."</td>";
    echo "<td>&nbsp;<a href='#'style='color:green' title='Approve this txn'>Yes</a>&nbsp;/&nbsp;<a href='#' style='color:red' title='Decline this txn'>No</a></td>";
    echo "</tr>";
  }
  echo "</table>";
?>

</body>
</html>
