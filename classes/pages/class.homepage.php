<?php

	require_once("../classes/class.GeneralPageClass.php");
	require_once("../classes/class.Database.php");

	require_once("../classes/class.XMLPages.php");

	class TPageClass extends TGeneralPageClass {
		function init() {
			// Makes it possible to parse xmlpages/files.xml
			$this->XMLPages = new TXMLPages();

			$contentTags = $this->XMLPages->getContentTags();

			$this->createContent();

			$this->assignPlaceholder('homepage_content');

			foreach ($contentTags as $key=>$value) {
				$this->assignPlaceholder($value);
			}

			$this->showContent();

			$this->database = new TDatabase();
		}

		function handleFormSubmission() {
		}
	}







