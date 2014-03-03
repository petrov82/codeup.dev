<?php

require_once("Filestore.php");

//create class to open & close csv file
class AddressDataStore extends Filestore{


// identify file from which data is pulled
	public function __construct($filename = '') {
		$filename = strtolower($filename);
		parent::__construct($filename);
	}

	
}
?>