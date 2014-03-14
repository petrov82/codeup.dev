<?php

// Get new instance of MySQLi object
$mysqli = @new mysqli('127.0.0.1', 'codeup', 'password', 'codeup_mysqli_test_db');

// Check for errors
if ($mysqli->connect_errno) {
    throw new Exception('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Retrieve a result set using SELECT
$result = $mysqli->query("SELECT * FROM users");

// Use print_r() to show rows using MYSQLI_ASSOC
while ($row = $result->fetch_array(MYSQLI_BOTH)) {
    print_r($row);
}
?>
