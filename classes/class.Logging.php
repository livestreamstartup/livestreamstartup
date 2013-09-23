<?php
	// Logging class
	class TLogging {
		function __construct() {
			$this->logfile = '../logs/log_'.date('Ymd').'.txt';
		}

		function log($message) {
			$fp = fopen($this->logfile, 'a+');
			$logMessage = date("Y m d h:i:s", time())."|".$message."\n";

			// Strip out root path
			$logMessage = str_replace('/var/www/livestreamstartup/', '', $logMessage);

			fwrite($fp,$logMessage);
			fclose($fp);
		}
	}
