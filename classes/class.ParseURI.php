<?php

	// Class for parsing the URI 
	require_once("../classes/class.Authentication.php");

	class TParseURI {
		function __construct($uri) {
			// Authentication class for checking if someone is logged in, etc.
			$this->Authentication 	= new TAuthentication();
			$this->doAuthentication();

			if (preg_match('!^/([^/]+)!imsx', $uri, $pmatches)) {
				$className = $pmatches[1];
			} else {
				$className = 'homepage';
			}

			if (strlen($className) > 32) {
				// TODO : Logging Message
				die("Unexpected error.");
			}

			$className = preg_replace('![^a-z0-9]!imsx', '', $className);

			// At this point, $className is sanitized

			if (file_exists("../classes/pages/class.".$className.".php")) {
				require_once("../classes/pages/class.".$className.".php");
				$pageClass = new TPageClass($className);

			} else {
				die("Page not found.");
			}


			$this->pageName = '';

			// Root URL     : http://www.livestreamstartup.com/  
			if ($uri == '/') {
				$this->pageName = 'root';
			}

			// /signup		: http://www.livestreamstartup.com/signup
			if ($uri == '/signup') {
				$this->pageName = 'signup';
			}

			// /login		: http://www.livestreamstartup.com/login
			if ($uri == '/login') {
				$this->pageName = 'login';
			}

		}

		function getPageName() {
			return $this->pageName;
		}

		function doAuthentication() {

			if ($_POST['submit'] == 'Submit') {
				// They submitted the login form

				if ($this->Authentication->checkUserPass()) {
					$ControllerVars['loggedin'] = 1;
					$this->Authentication->successfulLogin();
				} else {
					$this->Authentication->failedLogin();
				} 
			}

			// Assume not logged in
			$ControllerVars['loggedin'] = 0;

			if ($this->Authentication->isAuthorized()) {
				// Logged in
				$ControllerVars['loggedin'] = 1;
			} else {
				// Not Logged in

			}

			if ($ControllerVars['loggedin'] == 0) {
				// Not logged in
			}

			// At this point we know if the user is logged in
		}
	}

