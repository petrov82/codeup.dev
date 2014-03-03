<?php

class Filestore {

    public $filename = '';

    private $is_csv = FALSE;

    public function __construct($filename = '') 
    {
        // Sets $this->filename
        $this->filename = $filename;

        if (substr($filename, -3) == 'csv') {
            $this->is_csv = TRUE;
        }
    }

    /**
     * Returns array of lines in $this->filename
     */
    private function read_lines()
    {

    }

    /**
     * Writes each element in $array to a new line in $this->filename
     */
    private function write_lines($array)
    {

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
				//echo gettype($fields);
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

    public function open() 
    {
        if ($is_csv = TRUE) {
            return $this->read_csv();

        }
        else {
            return $this->read_lines();

        }
    }

    public function write($array) 
    {
        if ($is_csv = TRUE) {
            return $this->write_csv($array);

        }
        else {
            return $this->write_lines($array);

        }
    }

}

?>