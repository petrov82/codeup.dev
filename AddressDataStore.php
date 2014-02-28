<?php
//create class to open & close csv file
class AddressDataStore{

// }
// identify file from which data is pulled
	public $filename = '';

	function __construct($filename = 'address_book.csv')
	{
		if (!empty($filename)) {
			$this->filename = $filename;
		}
	}

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
?>