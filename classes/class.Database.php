<?php
	require_once("../classes/class.Logging.php");

	class TDatabase {
		function __construct() {
			$this->Logging = new TLogging();

			if ($this->database = mysqli_connect("localhost","root","livestream!","users")) {
				$this->Logging->log(__FILE__."||".__CLASS__."||".__LINE__."||Connected to database.");
			} else {
				$this->Logging->log("Could not connect to database.");
			}
		}

		function multiRowQuery($sqlQuery) {
			// Returns an array of all results
			$result = $this->database->query($sqlQuery);

			$rows = array();
			while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$returnArray[] = $rows;
			}

			return $returnArray;
		}

		function singleRowQuery($sqlQuery) {
			// Returns an array of one result
			$result = $this->database->query($sqlQuery);

			$rows = array();
			while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				return $rows;
			}

			// If we get here, something went wrong.
			return 0;
		}
	}
