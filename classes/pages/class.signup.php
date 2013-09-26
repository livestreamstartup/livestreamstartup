<?php

	require_once("../classes/class.GeneralPageClass.php");

	class TPageClass extends TGeneralPageClass {
		function init() {
			if (isset($_POST['submit'])) {
				$sqlQuery = "insert into users (username, password) values ('".$this->safePost['username']."', '".$this->safePost['password']."')";

				echo $sqlQuery;
			} else {
				$this->showContent();
			}
		}
	}
