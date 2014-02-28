<?php
$filename = 'data/list.txt';
  



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

// check if the assignment to the Post array is an array
// confer identity of items to the loaded text file
  $items = (view_file($filename));
    if (isset($_POST['assignment']) && ($_POST['assignment'] != "")) {
      $item = htmlspecialchars(htmlentities(strip_tags($_POST['assignment'])));
      array_push($items, $item);
      save_file($filename, $items);
      header("Location: todo-list.php");
      exit(0);
    }
  
// remove items from array

  if (isset($_GET['remove'])) {
      $itemId = $_GET['remove'];
      unset($items[$itemId]);
      save_file($filename, $items);
      header("Location: todo-list.php");
      exit(0);
    }

    // Verify there were uploaded files and no errors
  if ((count($_FILES) > 0 && $_FILES['file1']['error'] == 0) && ($_FILES['file1']['type'] == 'text/plain')) {
    // Set the destination directory for uploads
    $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
    // Grab the filename from the uploaded file by using basename
    $new_file = basename($_FILES['file1']['name']);
    // Create the saved filename using the file's original name and our upload directory
    $saved_filename = $upload_dir . $new_file;
    // Move the file from the temp location to our uploads directory
    move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

    $new_items = view_file($saved_filename);
    //if the checkbox returns true
    //set items array to file array ($new_items)
    
    //$items = if (isset($_POST['override']) ? $new_items : array_merge($items, $new_items);
    var_dump($_POST['override']);
    
   
    save_file($filename, $items);

  }

    
    
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
    <hr>
  <p>
    <nav>
    <a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The TODO List</a>
    </nav>
  </p>
  <hr/>

    <h3><u>Make a list of things you need to do.</u></h3>

<!--use form to add new items to array-->
    <form method="POST" enctype="multipart/form-data" action="">
      <p>
          <label for="assignment">New Item</label>
          <input id="assignment" name="assignment" type="text" autofocus='autofocus' placeholder="Item to do...">
      </p>

      <p>
          <label for="file1">Upload a List</label>
          <input id="file1" name="file1" type="file">
      </p>
      <p>
        <label for="override">Do You Want to Override the current list?</label>
        <input id="override" name="override" type="checkbox" value="1"></p>
      <p>
          <input type="submit" name="submit" value="Add Item">
      </p>
  </form>

    <ul>
      <?
      // cull thru items array and list each item with assigned keys
      foreach ($items as $key => $item): ?>
        <li><?= htmlspecialchars(htmlentities(strip_tags($item))) ?>  |<a href=?remove=<?=$key?> > Remove Item</a></li>
      <? endforeach; ?>
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