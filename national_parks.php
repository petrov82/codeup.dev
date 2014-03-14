<?php
// 1 target database array
// 2 display array
// 3 allow for organization ASC or DESC
require_once("dbconnect.php");

$sortCol = (!empty($_GET['sort_column'])) ? $_GET['sort_column'] : 'name';
$sortOrder = (!empty($_GET['sort_order'])) ? $_GET['sort_order'] : 'asc';

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
  while ($parks = $result->fetch_assoc()) {
   //   print_r($parks);
  
		  echo "<tr>";
			echo "<td>{$parks['name']}</td>";
			echo "<td>{$parks['location']}</td>";
			echo "<td>{$parks['date_established']}</td>";
			echo "<td>{$parks['area_in_acres']}</td>";
			echo "<td>{$parks['description']}</td>";
      echo "</tr>";
    }
?>
	
	</table>
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
