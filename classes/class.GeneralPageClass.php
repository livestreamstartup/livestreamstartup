<?php

	require_once("../classes/class.Sanitization.php");

	class TGeneralPageClass {
		function __construct($className) {
			$this->Sanitization = new TSanitization();

			$this->flags['content_exists'] = 0;

			if (isset($_POST['submit'])) {

				// Sanitize incoming POST data
				foreach($_POST as $key=>$value) {
					$this->safePost[$key] = $this->Sanitization->alphaNumeric($value);
				}
			}

			if (file_exists("../templates/pages/".$className.".html")) {
				$content = file_get_contents("../templates/pages/".$className.".html");

				// Any placeholders need to change here.
				$content = str_replace('{submit_url}', '/'.$className.'/submit', $content);

				$this->flags['content_exists'] = 1;
			} else {
				echo "Page content not found.";
			}

			$this->content = $content;

			$this->init();
		}

		function showContent() {
			if ($this->flags['content_exists'] == 1) {
				echo $this->content;
			} else {
				return 0;
			}
		}
	}
