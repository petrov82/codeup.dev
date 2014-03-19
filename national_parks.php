<?php
  // 1 target database array
  // 2 display array
  // 3 allow for organization ASC or DESC
  // 4 protect GET request from sql injection
require_once("dbconnect.php");

// array of acceptable labels for sorting
$acceptable = array('name', 'location', 'date_established', 'area_in_acres', 'description');
// sorting variables and their rules
$sortCol = (!empty($_GET['sort_column']) && in_array($_GET['sort_column'], $acceptable, true)) ? $_GET['sort_column'] : 'name';
$sortOrder = (!empty($_GET['sort_order']) || $_GET == 'desc') ? $_GET['sort_order'] : 'asc';

// add items into database
if (!empty($_POST)) {

  $stmt = $mysqli->prepare("INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
                            VALUES (?, ?, ?, ?, ?)");

  if(!$stmt) {
    throw new Exception('OH NOES! ' . $mysqli->error);
  }

  $stmt->bind_param("sssds", $_POST['name'], $_POST['location'], $_POST['date_established'], $_POST['area_in_acres'], $_POST['description']);

  $stmt->execute();

#//use to show code below//  $stmt->bind_result($name, $location, $date_established, $area_in_acres, $description);
}
// show items from database
$result = $mysqli->query("SELECT name, location, date_established, area_in_acres, description
                          FROM national_parks
                          ORDER BY $sortCol $sortOrder");



?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>National Parks</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
  <div class="container-fluid">
	<h1><u>National Parks</u></h1>
	<hr>
  <p>
    <nav>
    <a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The To-Do List</a> &nbsp; <a href="address_book.php">Address Book</a>
    </nav>
  </p>
  <hr/>





	<table class="table table-striped table-bordered table-condensed">

 <tr id="table_header">
       <th style="width: 10%;">Name
          &nbsp;
          <a href="?sort_column=name&amp;sort_order=asc"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
          <a href="?sort_column=name&amp;sort_order=desc"><span class="glyphicon glyphicon-circle-arrow-down"></span></a>
        </th>
       <th style="width: 10%;">Location
          &nbsp;
          <a href="?sort_column=location&amp;sort_order=asc"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
          <a href="?sort_column=location&amp;sort_order=desc"><span class="glyphicon glyphicon-circle-arrow-down"></span></a>
       </th>
       <th style="width: 15%;">Date Established
        &nbsp;
          <a href="?sort_column=date_established&amp;sort_order=asc"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
          <a href="?sort_column=date_established&amp;sort_order=desc"><span class="glyphicon glyphicon-circle-arrow-down"></span></a>
       </th>
       <th style="width: 15%;">Area in Acres
        &nbsp;
          <a href="?sort_column=area_in_acres&amp;sort_order=asc"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
          <a href="?sort_column=area_in_acres&amp;sort_order=desc"><span class="glyphicon glyphicon-circle-arrow-down"></span></a>
       </th>
       <th style="width: 50%;">Description
        &nbsp;
          <a href="?sort_column=description&amp;sort_order=asc"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
          <a href="?sort_column=description&amp;sort_order=desc"><span class="glyphicon glyphicon-circle-arrow-down"></span></a>
       </th>
     </tr>
<?
 // Use print_r() to show rows using MYSQLI_ASSOC
//  while ($stmt->fetch()) {
   //   print_r($parks);
while ($parks = $result->fetch_assoc()) {
  
		  echo "<td>{$parks['name']}</td>";
      echo "<td>{$parks['location']}</td>";
      echo "<td>{$parks['date_established']}</td>";
      echo "<td>{$parks['area_in_acres']}</td>";
      echo "<td>{$parks['description']}</td>";
      echo "</tr>";
    }
?>
	
	</table>
  <form role="form" method="POST" enctype="multipart/form-data" action="" >
    <div class="form-group">
          <input id="name" name="name" type="text" autofocus='autofocus' placeholder="Enter Park Name" required>
          <label for="name">Name</label>
      </div>
      <div class="form-group">
          <input id="location" name="location" type="text" placeholder="e.g. TX" required>
          <label for="location">Location</label>
      </div>
      <div class="form-group">
          <input id="date_established" name="date_established" type="text" placeholder="YYYY-MM-DD" required>
          <label for="date_established">Date Established</label>
      </div>
      <div class="form-group">
          <input id="area_in_acres" name="area_in_acres" type="text" placeholder="Numbers Only" required>
          <label for="area_in_acres">Area in Acres</label>
      </div>
      <div class="form-group">
          <textarea class="form-control" rows="5" id="description" name="description" placeholder="Enter a description" style="width: 50%;" required></textarea>
          <label for="description"><br>Description</label>
      </div>
      <p>
          <button type="submit" class="btn btn-info">Add Info</button>
      </p>
  </form>
	<br>
	<hr>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  <p>
    </div>
    <nav>
    <a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The To-Do List</a> &nbsp; <a href="address_book.php">Address Book</a>
    </nav>
  </p>
  <hr/>
  </body>
</html>
