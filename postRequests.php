<?php

error_reporting(0);

// Database configuration file
include 'config/db.php';

// Create database connection object
$data = new Databases;  

// Takes raw data from the request
$json = file_get_contents('php://input');

// Convert json value to string and store in a variable
$json_data = strval($json);

// Get the client IP
$client_ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);;


// Check whether data is received or not, insert into table if data is received.
if($json_data != "")
{
	     $insert_data = array(  
		   'data2'     =>     mysqli_real_escape_string($data->con, $json_data),  
		   'ip'        =>     mysqli_real_escape_string($data->con, $client_ip)  
	      );  
	      if($data->insert('json_data', $insert_data))  
	      {  
		   echo json_encode('Record Inserted');  
	      } 
}
else
{
	      echo json_encode('No data received from MQTT broker');

}
?>

