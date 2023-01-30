<?php
function apply_abbreviations($string) {
		//replacement to multi word expressions
		$string = str_replace("Teaching and Learning", "T&L", $string);
		$string = str_replace("Teaching & Learning", "T&L", $string);
		$string = str_replace("Human Resources", "HR", $string);
			/* array for the words we will replace. the value is the word to be found, the key is what you would like put in place	*/
			$abbreviated_words = array(
				"Admin" => "Administrator",
				"Asst" => "Assistant",
				"Elem" => "Elementary",
				"Sec" => "Secondary",
			);
			// explode the string into individual words. checks those words against the array. if they are in the array it will swap the key in place, otherwise spits out the word.
			$words = explode(" ", $string);
			foreach($words as $word) {
				$key = array_search($word, $abbreviated_words);
				if($key){
					echo $key . " ";
				} else {
					echo $word . " ";
				}
			}
	}
