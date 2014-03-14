<?php

// Get new instance of MySQLi object
$mysqli = @new mysqli('127.0.0.1', 'codeup', 'password', 'codeup_mysqli_test_db');

// Check for errors
if ($mysqli->connect_errno) {
    throw new Exception('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

//Create the query and assign to var
// $tableCreate = 'CREATE TABLE national_parks (
//     id INT NOT NULL AUTO_INCREMENT,
//     name VARCHAR(240) NOT NULL,
//     location VARCHAR(50) NOT NULL,
//     date_established DATE NOT NULL,
//     area_in_acres FLOAT(10,3) DEFAULT 0,
//     description TEXT NOT NULL,
//     PRIMARY KEY (id)
// );';


// //Run query, if there are errors then display them
// if (!$mysqli->query($tableCreate)) {
//     throw new Exception("Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error);
// }

$parks = [
		
        [
        'name' => 'Badlands',
        'location' => 'South Dakota',
        'date_established' => '1978-11-10',
        'area_in_acres' => '242755.94 acres (982.4 km2)',
        'description' => 'The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the worlds richest fossil beds from the Oligocene epoch, and there is wildlife including bison, bighorn sheep, black-footed ferrets, and swift foxes.',
        ],

        [
        'name' => 'Capitol Reef',
        'location' => 'Utah',
        'date_established' => '1971-12-18',
        'area_in_acres' => '241904.26 acres (979.0 km2)',
        'description' => 'The parks Waterpocket Fold is a 100-mile (160 km) monocline that shows the Earths geologic layers. Other natural features are monoliths and sandstone domes and cliffs shaped like the United States Capitol.',
        ]
];

foreach ($parks as $park) {
    $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}', '{$park['description']}');";
   $mysqli->query($query);

}

?>
