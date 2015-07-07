<?php

class dblib {

	var $dbcon;
	
	function __construct($server, $username, $password, $database) {
		$this->dbcon = mysqli_connect($server, $username, $password, $database);

		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}

	function check_db() {
		if ($this->dbcon->ping()) {
			printf ("Our connection is ok!\n");
		} else {
			printf ("Error: %s\n", $this->dbcon->error);
		}
	}
	
	function db_query($sql) {
		
		$results = mysqli_query($this->dbcon, $sql);

		if(!results) {
			die("SQL db_query Error: ".$sql);
		}
		
		return $results;
	}
	
	function fetch_array($results) {
		return mysqli_fetch_array($results);
	}
	
	function no_of_rows($results) {
		$no_of_rows = 0;
		if($results === false || $results === true) {
			$no_of_rows = 0;
		} else {
			$no_of_rows = mysqli_num_rows($results);
		}
		
		
		return $no_of_rows;
	}
}