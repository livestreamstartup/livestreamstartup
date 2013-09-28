<?php

	require_once("../classes/class.GeneralPageClass.php");
	require_once("../classes/class.Database.php");

	class TPageClass extends TGeneralPageClass {
		function init() {
			header("Content-Style-Type: text/css");
			header("Content-Type: text/css");

			if (preg_match('!^/css/(.*?)$!imsx', $_SERVER['REQUEST_URI'], $pmatches)) {
				$filename = "../templates/css/".$pmatches[1];

				if (file_exists($filename)) {
					$file = file_get_contents($filename);
					echo $file;
				}
			}
		}


		function handleFormSubmission() {
		}
	}
