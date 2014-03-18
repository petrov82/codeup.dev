<?php

	// 1 request from database
	// 2 place data into an array
	// 3 return array
	// 4 set functions: SELECT, ORDER as ASC or DESC 
	// Get new instance of MySQLi object
	$mysqli = @new mysqli('127.0.0.1', 'codeup', 'password', 'codeup_mysqli_test_db');

	// Check for errors
	if ($mysqli->connect_errno) {
	    throw new Exception('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}// Retrieve a result set using SELECT

?>
