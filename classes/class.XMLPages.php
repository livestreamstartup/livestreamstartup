<?php
	class TXMLPages {
		function __construct() {
			$file = file("../xmlpages/homepage.xml");

			foreach ($file as $key=>$value) {
				if (preg_match('!^<(.*?)>!imsx', $value, $pmatches)) {
					$value = trim($value);

					$parentTag  = 0;
					$currentTag = $pmatches[1];

					$this->divContent[] 	= $divContent;
					$this->contentTags[] 	= $currentTag;
				}
				if (preg_match('!^([\t]+)!imsx', $value, $pmatches)) {
					// $pmatches[1] contains all tabs at start of the line, therefore
					// strlen($pmatches[1]) contains the total number of tabs.
					$numTabs = strlen($pmatches[1]);


					if ($numTabs == 1) {
						$parentTag = $currentTag;
					}

					if (preg_match('!<(.*?)>!imsx', $value, $qmatches)) {
						$childrenTags[ $parentTag ][] = $qmatches[1];
					}

				}

				// Immediately after the line which matches a given tag, check
				// to see if the closing tag is reached.
				if (preg_match('!</'.$currentTag.'>')) {
					echo "Reached end of this tag!";
				}
			}

			
			foreach($childrenTags as $key=>$value) {
				if (is_array($value)) {

					$divContent .= "<div class=\"".$key."\">\n";

					foreach($value as $akey=>$avalue) {
						$divContent .= "\t<div class=\"".$avalue."\">{".$avalue."}</div>\n";
					}

					$divContent .= "</div>";
				}
			}

			echo "\n\n\n";
			echo "<!-- class.XMLPages.php : xmlpages/homepage.xml -->\n";
			echo $divContent;
			echo "\n\n\n";

		}

		function getContentTags() {
			return $this->contentTags;
		}
	}
