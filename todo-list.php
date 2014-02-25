<!DOCTYPE html>

<?php 

echo "<p>POST:</p>";
var_dump($_POST);

echo "<p>GET:</p>";
var_dump($_GET);

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The TODO List</title>
    <link rel="stylesheet" type="text/css" href="theme.css">

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

  <?php  
// create an empty array
  
  $filename = 'data/list.txt';
  

// Iterate through list items
function list_items($assignment) {

    $list = '';
 
    foreach ($assignment as $key => $value) {

       $list .= $value . PHP_EOL;
   }
   return $list;
}

//set function to write to $filename
function view_file($target_file) {

    $handle = fopen($target_file, "r");
    $contents = fread($handle, filesize($target_file));
    $contents_array = explode("\n", $contents);
    fclose($handle);
    return $contents_array;
}

$items = (filesize($filename) > 0) ? view_file($filename) : array();


// save items to file
function save_file($target_file, $new_items) {

    $handle = fopen($target_file, 'w');
    //foreach ($new_items as $new_item) {
    fwrite($handle, implode("\n", $new_items));
    //}
    fclose($handle);
}

?>

    <hr>
  <p>
    <nav>
    <a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The TODO List</a>
    </nav>
  </p>
  <hr/>

    <h3><u>Make a list of things you need to do.</u></h3>

<?php 
//check if the assignment to the Post array is an array
  $items = (view_file($filename));
    if (isset($_POST['assignment']) && ($_POST['assignment'] != "")) {
      $item = $_POST['assignment'];
      array_push($items, $item);
      save_file($filename, $items);
      header("Location: todo-list.php");
      exit(0);
    }
  // confer identity of items to the loaded text file
?>

<?php 
// remove items from array

    if (isset($_GET['remove'])) {
      $itemId = $_GET['remove'];
      unset($items[$itemId]);
      save_file($filename, $items);
      header("Location: todo-list.php");
      exit(0);
    }

    
  // confer identity of items to the loaded text file
?>
<!--use form to add new items to array-->
    <form method="POST" action="">
      <p>
          <label for="assignment">New Item</label>
          <input id="assignment" name="assignment" type="text" autofocus='autofocus' placeholder="Item to do...">
      </p>
      <p>
          <input type="submit" name="submit" value="Add Item">
      </p>
  </form>

    <ul>
      <?php
      // cull thru items array and list each item
      foreach ($items as $key => $item) {
       echo "<li>$item |<a href=\"?remove=$key\"> Remove Item</a></li>";
      } ?>
  </ul>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <hr>
  <p>
    <nav>
    <a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The TODO List</a>
    </nav>
  </p>
  <hr/>
  </body>
</html>