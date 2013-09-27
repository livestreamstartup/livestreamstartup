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
		}
	}
