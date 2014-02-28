<?php

//create class to open & close csv file
class AddressDataStore{

// }
// identify file from which data is pulled
	public $filename = '';

	//open csv file
	public function open_csv() {
		
		// if (filesize($this->filename) > 0) {
		// 	$address_book = $this->filename;
		// } else {
			$address_book = [];
		// }

		if (($handle = fopen($this->filename, "r")) !== FALSE) {
			while (($fields = fgetcsv($handle)) !== FALSE) {
				array_push($address_book, $fields);
				//echo gettype($fields);
			}

	    	fclose($handle);
		}
		
		return $address_book;
	}
	// function designed to save new input to the file
	public function write_csv($entry) {
		$handle = fopen($this->filename, 'w');
		foreach ($entry as $item) {
	    	fputcsv($handle, $item);
		}

	    fclose($handle);
		}	
}

$address_book = new AddressDataStore;

$address_book->filename = "address_book.csv";

$addresses = $address_book->open_csv();


$error_messages = [];
//push new fields onto address book array
if (!empty($_POST)) {
	
			$field['name'] = $_POST['name'];
			$field['street'] = $_POST['street'];
			$field['city'] = $_POST['city'];
			$field['state'] = $_POST['state'];
			$field['zip'] = $_POST['zip'];
			$field['usrtel'] = $_POST['usrtel'];

			
		foreach ($field as $key => $value) {
			if (empty($value)) {
				array_push($error_messages, "$key must have a value");	
    		}	
		}
		if (empty($error_messages)) {
				array_push($addresses, $field);
				$address_book->write_csv($addresses);
				// header("Location: address_book.php");
  //   			exit(0);
				}
} 

if (isset($_GET['remove'])) {
      $itemId = $_GET['remove'];
      unset($addresses[$itemId]);
      $address_book->write_csv($addresses);
      header("Location: address_book.php");
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







	<h2><u>Address Book</u></h2>





	<table>
				
		<?php foreach ($addresses as $key => $row): ?>
			<tr> <?php foreach ($row as $key2 => $value2): ?>
				<td> <?= htmlspecialchars(htmlentities(strip_tags($value2)))?> </td>
			<?php endforeach ?> <td>|<a href=?remove=<?=$key?> > Remove Item</a></li></td></tr> 
		<?php endforeach ?> 
	
	</table>
	













	<br>
	<hr>
	<form method="POST" enctype="multipart/form-data" action="" >
		<p>
          <label for="name">Name *</label>
          <input id="name" name="name" type="text" autofocus='autofocus' placeholder="Enter Full Name" >
      </p>
      <p>
          <label for="street">Street Address *</label>
          <input id="street" name="street" type="text" placeholder="Enter Address" >
      </p>
      <p>
          <label for="city">City *</label>
          <input id="city" name="city" type="text" placeholder="Enter City" >
      </p>
      <p>
          <label for="state">State/Region *</label>
          <input id="state" name="state" type="text" placeholder="Enter State or Region" >
      </p>
      <p>
          <label for="zip">Postal Code *</label>
          <input id="zip" name="zip" type="text" placeholder="Enter ZIP" >
      </p>
      <p>
          <label for="phone">Telephone </label>
          <input id="phone" name="usrtel" type="tel" placeholder="Enter Phone Number">
      </p>
      <p>
          <input type="submit" name="submit" value="Add Item">
      </p>

	</form>
<p>* Required Fields</p>
</body>
</html>