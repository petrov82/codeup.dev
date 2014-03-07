<?php 


echo "<p>POST:</p>";
var_dump($_POST);

echo "<p>GET:</p>";
var_dump($_GET);

?>

<!DOCTYPE html>

<html>
<head>
	<title>Test Form!</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<h1>Hello World!</h1>
	<hr>
	<p>
		<nav>
    	<a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The To-Do List</a> &nbsp; <a href="address_book.php">Address Book</a>
    	</nav>
	</p>
	<hr/>
	<body>
		 <form method="POST" action="">
	    <p>
	        <label for="username">Username</label>
	        <input id="username" name="username" type="text" placeholder="Username">
	    </p>
	    <p>
	        <label for="password">Password</label>
	        <input id="password" name="password" type="password" placeholder="Password">
	    </p>
	    <p>
	        <input type="submit" name="submit" value="Login Please">
	        <button type="reset">Reset</button>
	    </p>
	    <p>
	    	<label for="checkbox">Do You Want Free Pizza?</label>
	    	<input id="checkbox" name="checkbox" type="checkbox" value="Do You Want Free Pizza?"></p>
	</form>

	<form>
		<p>
		<label for="first_name">User Login</label>
		<input type="text" id="first_name" name="first_name" value="" placeholder="User Login">
	</p>
	<p>
		<label for="pizza_body">Tell me Your Pie</label>
		<textarea id="pizza_body" name="pizza_body" placeholder="What kind of Pizza do you want?"></textarea>
	</p>
	<p>
	    	<label for="checkbox">Do You Want save your Pizza Preferences?</label>
	    	<input id="checkbox" name="checkbox" type="checkbox" value="Do You Want save your Pizza Preferences?" checked></p>
	<p>
		<label for="email_body">Compose an email</label>
		<textarea id="email_body" name="email_body" rows="30" cols="50" placeholder="Write your comments here..."></textarea>
	</p>
	<p>	        
		<input type="submit" name="submit" value="Pizza Me">
	</p>
	</form>

<h2>Pizza Personality Pop Quiz</h2>
	<form>
		<p>What is your favorite style of music?</p>
<label for="q1a">
    <input type="radio" id="q1a" name="q1" value="houston">
    Houston
</label>
<label for="q1b">
    <input type="radio" id="q1b" name="q1" value="dallas">
    Dallas
</label>
<label for="q1c">
    <input type="radio" id="q1c" name="q1" value="austin">
    Austin
</label>
<label for="q1d">
    <input type="radio" id="q1d" name="q1" value="san antonio">
    San Antonio
</label>

	<p>Pick your Crust Options</p>
	    	<label for="checkbox">Stuffed</label>
	    	<input id="checkbox" name="checkbox" type="checkbox" value="Stuffed" checked>

	    	<label for="checkbox">Thin</label>
	    	<input id="checkbox" name="checkbox" type="checkbox" value="Thin" checked>

	    	<label for="checkbox">Stuffed</label>
	    	<input id="checkbox" name="checkbox" type="checkbox" value="Stuffed" checked>
	</p>

<p>	        
	<input type="submit" name="submit" value="Pizza Me">
</p>



<label for="os">What operating systems have you used? </label>
<select id="os" name="os[]" multiple>
    <option value="linus">Linux</option>
    <option value="osx">OS X</option>
    <option value="windows">Windows</option>
</select>

	</form>

<h2>Select Testing</h2>
	<form>
		<p>
		<label for="transmission">Do You Currently Have a Pizza?</label>
			<select id="transmission" name="transmission">
	   		 <option value="1" >Yes</option>
	   		 <option value="0" >No</option></select>
		</p>

	<p>	        
		<input type="submit" name="submit" value="Pizza Me">
	</p>
		</form>

	</body>
<hr>
	<p>
		<nav>
    	<a href="index.html">Home</a> &nbsp; <a href="hello-world.html">About Me</a>  &nbsp; <a href="my_first_test.php">Test Form</a> &nbsp; <a href="todo-list.php">The To-Do List</a> &nbsp; <a href="address_book.php">Address Book</a>
    	</nav>
	</p>
	<hr/>
</html>
