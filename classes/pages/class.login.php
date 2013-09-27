<?php

	require_once("../classes/class.GeneralPageClass.php");
	require_once("../classes/class.Database.php");

	class TPageClass extends TGeneralPageClass {
		function init() {
			$this->createContent();
			$this->showContent();

			$this->database = new TDatabase();
		}

		function handleFormSubmission() {
			print_r($this->safePost);

			$sqlQuery = "select count(*) as count from users.users where username = '".$this->safePost['username']."' and password = '".$this->safePost['password']."'";
			print_r($this->database->singleRowQuery($sqlQuery));
			echo "\n<br />";
			echo $sqlQuery."<br />";
			echo "Login Form Submission<br />";
		}
	}
