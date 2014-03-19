<?php
/**
* class extends Exception class to present custom exception
*/
class UnexpectedTypeException extends Exception{}
// receives connection from database
require_once('dbconnect.php');

// set limit of items dispayed on page
$limit = 2;
// default message
$default = "You have no items!";
// set row and page numbers for pagination

// add items to todo
if (!empty($_POST)) {

    $stmt = $mysqli->prepare("INSERT INTO todo (items, completed, priority) VALUES (?, ?, ?)");

    // throw exception!
    if(!$stmt) {
        throw new Exception('OH NOES! ' . $mysqli->error);
        }

    $stmt->bind_param("sii", $_POST['items'], $_POST['completed'], $_POST['priority']);

    $stmt->execute();

    $stmt->bind_result($items, $completed, $priority);

    }

// display database items
$result = $mysqli->query("SELECT * FROM todo");

// allow removal of items
if (isset($_GET['remove'])) {
      // Create the prepared statement
    $stmt = $mysqli->prepare("DELETE FROM todo WHERE id = ?");

    $stmt->bind_param("i", $_GET['remove']);

    $stmt->execute();

    }

$num_rows = $result->num_rows;

$num_pages = ceil($num_rows / $limit);

// pagination process
// if(!empty($_GET['page'])) {

//     $page = $_GET['page'];

//     } else {

//           $page = 1;

//       }

// if ($page > 1) {

//     $offset = ($_GET['page'] * $limit) - $limit;

//     } else {

//         $offset = 0;
//     }

// $stmt = $mysqli->prepare("SELECT * FROM todo (LIMIT ? OFFSET ?");

// $stmt->bind_param("ii", $limit, $offset);

// $stmt->execute();

// $stmt->bind_result($items, $completed, $priority);

// $rows = array();

// while ($stmt->fetch()) {
//     $rows[] = array('id' => $id, 'name' => $name, 'completed' => $completed, 'priority' => $priority);
// }

// close database connection
$mysqli->close();

// confer identity of items to the loaded text fil
// check if the assignment to the Post array is an array
// try/catch to message back exception
$error = "";

  try {
    if (isset($_POST['items'])) {
        if ($_POST['items'] == "") {
            throw new Exception("Error Processing Request. Press the Back button to undo. You must input something.");
        } elseif (strlen($_POST['items']) > 240) {
          throw new Exception("Error Processing Request. Press the Back button to undo. Use 240 characters or less.");
        } elseif (!is_string($_POST['items'])) {
          throw new UnexpectedTypeException('$item must be a string');
          }
      }
    } catch (UnexpectedTypeException $ex) {
      $error = "<p>Error Processing Request. You must input words. These abstractions have no place here.</p>";
    } catch (Exception $e) {
       $error = "<p>Error Processing Request. You must input something, or use 240 characters or <strong>less</strong>.</p>";
        }
    
   
  
// remove items from array



  //   // Verify there were uploaded files and no errors
  // if ((count($_FILES) > 0 && $_FILES['file1']['error'] == 0) && ($_FILES['file1']['type'] == 'text/plain')) {
  //   // Set the destination directory for uploads
  //   $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
  //   // Grab the filename from the uploaded file by using basename
  //   $new_file = basename($_FILES['file1']['name']);
  //   // Create the saved filename using the file's original name and our upload directory
  //   $saved_filename = $upload_dir . $new_file;
  //   // Move the file from the temp location to our uploads directory
  //   move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

  //   $new_items = $todo->open($saved_filename);
  //   //if the checkbox returns true
  //   //set items array to file array ($new_items)
    
  //   $items = (isset($_POST['override'])) ? $new_items : array_merge($items, $new_items);
   
  //   $todo->write($items);
  //   // header("Location: todo-list.php");
  //   // exit(0);

  // }

  //set condition if file is empty to stop and report error
  //   } elseif {
  //     # code...
  //   }  {
  //   echo "That file was not a text file, so I didn't add anything.";
  // }

  // Check if we saved a file
  if (isset($saved_filename)) {
      // If we did, show a link to the uploaded file
      echo "<p>You can download your file <a href='/uploads/{$filename}'>here</a>.</p>";
  }
?>



<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The TODO List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <!--link href="css/bootstrap.min.css" rel="stylesheet"-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <h1>The TODO List</h1>
    <hr>
  <p>
    <nav>
    <a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The To-Do List</a> &nbsp; <a href="address_book.php">Address Book</a>
    </nav>
  </p>
  <hr/>

    <h3><u>Make a list of things you need to do.</u></h3>

<!--use form to add new items to array-->
    <form method="POST" enctype="multipart/form-data" action="">
      <p>
          <label for="file1">Upload a List</label>
          <input id="file1" name="file1" type="file">
      </p>
      <p>
        <label for="override">Do You Want to Override the current list?</label>
        <input id="override" name="override" type="checkbox" value="1"></p>
      <p>
          <label for="assignment">New Item</label>
          <input id="assignment" name="assignment" type="text" autofocus='autofocus' placeholder="Item to do...">
      </p>
      <p><?= isset($error) ? $error : ""; ?></p>
      <p><?= empty($rows) ? $default : "" ; ?></p>
      <p>
          <input type="submit" name="submit" value="Add Item">
      </p>
  </form>

    <ul>
      <? foreach ($rows as $key => $row): ?>
        <li><?= htmlspecialchars(htmlentities(strip_tags($row))) ?>  |<a href=?remove=<?=$key?> > Remove Item</a></li>
      <? endforeach; ?>
  </ul>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <hr>
  <p>
    <nav>
    <a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The To-Do List</a> &nbsp; <a href="address_book.php">Address Book</a>
    </nav>
  </p>
  <hr/>
  </body>
</html>
