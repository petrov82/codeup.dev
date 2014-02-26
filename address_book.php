<?php
// identify file from which data is pulled
$filename = 'address_book.csv';
$address_book = [];

if (!empty($_POST)) {
$fields = ([$_POST['name'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['usrtel'],]);
} else {

}

//display the csv as a table
// echo "<html><body><h2><u>Address Book</u></h2><table>\n\n";
// $address_book = fopen($filename, "r");
// while (($fields = fgetcsv($address_book)) !== false) {
//         echo "<tr>";
//         foreach ($fields as $cell) {
//                 echo "<td>" . htmlspecialchars($cell) . "</td>";
//         }
//         echo "</tr>\n";
// }
// fclose($address_book);
// echo "\n</table></body></html>";

function open_csv($filename) {
	$handle = fopen($filename, "r");
	while (($fields = fgetcsv($handle)) !== false) {
        foreach ($fields as $fields) {
}
fclose($address_book);
echo "\n</table></body></html>";
	
}

// function designed to save new input to the file
function write_csv($filename, $fields) {
	$handle = fopen($filename, 'w');
	foreach ($fields as $item) {
    fputcsv($handle, $item);
	}
    fclose($handle);
}

if (isset($_POST)) {
	array_push($address_book, $fields);
	write_csv($filename, $address_book);
	//header("Location: address_book.php");
      exit(0);
}
	






// Step 1) create table with proper headings in a csv file,  
// Create form below for adding new entries. Each entry should take a name, address, city, state, zip, and phone.
	
// Step 2) Create a function to store a new entry. A new entry should have validate 5 required row: name, address, city, state, and zip. Display error if each is not filled out. place each entry into an array and then push that array onto the greater array.

	
    

// Step 3) Use a CSV file to save to your list after each valid entry.

// Step 4) Open the CSV file in a spreadsheet program or text editor and verify the contents are what you expect after adding some entries.

// Step 5) Refactor your code to use functions where applicable.
?>

<!DOCTYPE html>

<html>
<head>
	<title>Address Book</title>
</head>
<body>
	<br>
	<hr>
	<form method="POST" enctype="multipart/form-data" action="">
		<p>
          <label for="name">Name *</label>
          <input id="name" name="name" type="text" autofocus='autofocus' placeholder="Enter Full Name">
      </p>
      <p>
          <label for="street">Street Address *</label>
          <input id="street" name="street" type="text" autofocus='autofocus' placeholder="Enter Address">
      </p>
      <p>
          <label for="city">City *</label>
          <input id="city" name="city" type="text" autofocus='autofocus' placeholder="Enter City">
      </p>
      <p>
          <label for="state">State/Region *</label>
          <input id="state" name="state" type="text" autofocus='autofocus' placeholder="Enter State or Region">
      </p>
      <p>
          <label for="zip">Postal Code *</label>
          <input id="zip" name="zip" type="text" autofocus='autofocus' placeholder="Enter ZIP">
      </p>
      <p>
          <label for="phone">Telephone </label>
          <input id="phone" name="usrtel" type="tel" autofocus='autofocus' placeholder="Enter Phone Number">
      </p>
      <p>
          <input type="submit" name="submit" value="Add Item">
      </p>

	</form>
<p>* Required Fields</p>
</body>
</html>