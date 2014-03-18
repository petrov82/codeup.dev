<?php

//create the Filestore class to open write and close multiple data sources (.txt, .csv, mysql database[for future, .ics, .doc, .xml, .ppt, and Apple docs, as well as Quip])
require_once('dbconnect.php');

class Filestore {

    // select $data from $source_table
    // Talk to Chris Turner about functions

    //  filename will be an empty string until defined by application
    public $filename = '';

    //  default filetype is NOT.csv
    private $is_csv = FALSE;

    // function to read filetype passed thru upload
    public function __construct($filename = '') 
    {
        // Sets $this->filename
        $this->filename = $filename;
        // sets to csv method when passed a .csv file
        if (substr($filename, -3) == 'csv') {
            $this->is_csv = TRUE;
        }
    }

    /**
     * Returns array of lines in $this->filename
     */
    private function read_lines()
    {
        $handle = fopen($this->filename, "r");
        $contents = fread($handle, filesize($this->filename));
        $contents_array = explode("\n", $contents);
        fclose($handle);
        return $contents_array;
    }

    /**
     * Writes each element in $array to a new line in $this->filename
     */
    private function write_lines($new_items)
    {
        $handle = fopen($this->filename, 'w');
        fwrite($handle, implode("\n", $new_items));
        fclose($handle);

    }

    /**
     * Reads contents of csv $this->filename, returns an array
     */
    private function read_csv()
    {
        $address_book = [];
		if (($handle = fopen($this->filename, "r")) !== FALSE) {
			while (($fields = fgetcsv($handle)) !== FALSE) {
				array_push($address_book, $fields);
			}
	    	fclose($handle);
		}
		return $address_book;
    }

    /**
     * Writes contents of $array to csv $this->filename
     */
    private function write_csv($entry)
    {
		$handle = fopen($this->filename, 'w');
		foreach ($entry as $item) {
	    	fputcsv($handle, $item);
			}
	    fclose($handle);
    }

    /**
    * Opens either csv or txt file
    */
    public function open() 
    {
        if ($this->is_csv == TRUE) {
            return $this->read_csv();

        }
        else {
            return $this->read_lines();

        }
    }

    /**
    * Writes to either csv or txt file
    */
    public function write($array) 
    {
        if ($this->is_csv == TRUE) {
            return $this->write_csv($array);

        }
        else {
            return $this->write_lines($array);

        }
    }

}

?>
