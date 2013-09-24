<?php
//	Controller

	require_once("../classes/class.Session.php");
	require_once("../classes/class.Database.php");
	require_once("../classes/class.Logging.php");
	require_once("../classes/class.ParseURI.php");

	$Session			= new TSession();
	$Database			= new TDatabase();
	$Logging			= new TLogging();


	$ParseURI			= new TParseURI($_SERVER['REQUEST_URI']);

	$Logging->log("Starting script.");


	die;


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

	

