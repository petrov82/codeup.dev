<?php 


echo "<p>POST:</p>";
var_dump($_POST);

echo "<p>GET:</p>";
var_dump($_GET);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The TODO List</title>

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
    <h1>The TODO List</h1>
    <hr>
  <p>
    <nav>
    <a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The TODO List</a>
    </nav>
  </p>
  <hr/>

    <h3><u>Make a list of things you need to do.</u></h3>

    <form method="GET" action="">
      <p>
          <label for="assignment">New Item</label>
          <input id="assignment" name="assignment" type="text" placeholder="Item to do...">
      </p>
      <p>
          <input type="submit" name="submit" value="Add Item">
          <button type="reset">Reset</button>
      </p>
      <p>
        <label for="checkbox">Do You Want to save?</label>
        <input id="checkbox" name="checkbox" type="checkbox" value="1" checked></p>
  </form>
    <ul>
    <li>Buy Pizza</li>
    <li>Buy Soda</li>
    <li>Buy Birthday present for Kelli</li>
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