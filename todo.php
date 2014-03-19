<?php
  // 1 target database array
  // 2 display array
  // 3 allow for organization ASC or DESC
  // 4 protect GET request from sql injection
require_once("dbconnect.php");

// array of acceptable labels for sorting
$acceptable = array('item', 'completed', 'priority');
// sorting variables and their rules
$sortCol = (!empty($_GET['sort_column']) && in_array($_GET['sort_column'], $acceptable, true)) ? $_GET['sort_column'] : 'item';
$sortOrder = (!empty($_GET['sort_order']) || $_GET == 'desc') ? $_GET['sort_order'] : 'asc';

$itemsPerPage = 2;
$currentPage = 1;
$offset = $currentPage;


// add items into database
	// Delete code if post if from remove form
	if(!empty($_POST['remove']))
	{
		$stmt = $mysqli->prepare("DELETE FROM todos WHERE id = ?");
		$stmt->bind_param("i", $_POST['remove']);
		$stmt->execute();
		$alert = '<p class="close" class="fade" class="in" data-dismiss="alert" aria-hidden="true" class="bg-success">Item ' . $_POST['remove'] . ' has been removed.</p>';
	} elseif (!empty($_POST)) {
		  $stmt = $mysqli->prepare("INSERT INTO todos (item) VALUES (?)");

		  if(!$stmt) {
		    throw new Exception('OH NOES! ' . $mysqli->error);
		  }

		  $stmt->bind_param("s", $_POST['item']);

		  $stmt->execute();

		#//use to show code below//  $stmt->bind_result($item, $completed, $priority);
		}
// show items from database
$todo = $mysqli->query("SELECT id, item
                          FROM todos
                          ORDER BY $sortCol $sortOrder");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDoList</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    		$(".alert").alert(close);
    </script>
</head>
<body>
  <div class="container-fluid">
	<h1><u>ToDoList</u></h1>
	<hr>
  <p>
    <nav>
    <a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The To-Do List</a> &nbsp; <a href="address_book.php">Address Book</a>
    </nav>
  </p>
  <hr/>

<a href="#" class="pull-left">Previous</a> <a href="#" class="pull-right">Next</a>


	<table class="table table-striped table-bordered table-condensed">

 <tr id="table_header">
       <th style="width: 20%;">Item
          &nbsp;
          <a href="?sort_column=name&amp;sort_order=asc"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
          <a href="?sort_column=name&amp;sort_order=desc"><span class="glyphicon glyphicon-circle-arrow-down"></span></a>
        </th>
     </tr>
		<?
		 // Use print_r() to show rows using MYSQLI_ASSOC
		//  while ($stmt->fetch()) {
		   //   print_r($parks);
		if(!empty($alert))
		{
			// print alert if set
			echo $alert;
			// unset alert
			unset($alert);
		}

		while ($items = $todo->fetch_assoc()): ?>
		  <tr>
				<td><?= $items['item']; ?></td>
				<td><button class="btn btn-danger btn-sm pull-right" onclick="removeById(<?= $items['id']; ?>)">Remove</button></td>
				</tr>
		    <? endwhile; ?>
	</table>
	<!-- Remove form post -->
	<form id="removeForm" action="todo.php" method="POST">
		<input id="removeId" type="hidden" name="remove" value="">
	</form>
	<script>
		var form = document.getElementById('removeForm');
		var removeId = document.getElementById('removeId');
		function removeById(id) {
			removeId.value = id;
			form.submit();
		}
	</script>
  <form role="form" method="POST" enctype="multipart/form-data" action="" >
    <div class="form-group">
          <input id="item" name="item" type="text" autofocus='autofocus' placeholder="Item to do...">
          <label for="item">Item to do</label>
      </div>
          <button type="submit" class="btn btn-info">Add Info</button>
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
