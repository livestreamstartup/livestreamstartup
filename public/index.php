<?php
//	Controller

	if ($_SERVER['REQUEST_URI'] != '/') {
		preg_match('!name/([a-z]+)!imsx', $_SERVER['REQUEST_URI'], $pmatches);

		$content = file_get_contents("../templates/index.html");
		$content = str_replace('{text}', 'Hello, '.$pmatches[1], $content);
		echo $content;

		// Homepage!
	} else {
		echo "You are not on the homepage!";
		// Not Homepage

	}

	

