<?php

	require_once("../classes/class.GeneralPageClass.php");
	require_once("../classes/class.Database.php");

	class TPageClass extends TGeneralPageClass {
		function init() {
			$this->database = new TDatabase();

			if (!isset($_POST['submit'])) {
				$this->createContent();
				$this->showContent();
			}
		}

		function handleFormSubmission() {
			$sqlQuery = "insert into users (username, password) values ('".$this->safePost['username']."', '".$this->safePost['password']."')";

			$this->database->singleRowQuery($sqlQuery);

			echo "This is the form handler.\n<br />";
		}
	}
