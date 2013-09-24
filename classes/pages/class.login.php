<?php
	class TPageClass {
		function __construct($className) {

			$content = file_get_contents("../templates/pages/".$className.".html");
			echo $content;
		}
	}
