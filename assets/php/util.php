<?php
	
	class Result {
		
		public $wanted_w;
		
		public $_words_arr;
		
		public $n_words = 1;
		
		// function __construct() {
			
			
		// }		
		
		public function HaveNOfResults($number) {
			
			if($this->n_words >= $number) {
				
				return true;
				
			}	
			
			return false;
			
		}
		
	}

	function Explode_S($_str) {
		
		$temp_s1 = explode(",",	$_str);  // Remove ","

		$temp_s2 = implode(" ", $temp_s1); 
		
		$temp_s3 = explode(" ",	$temp_s2);
		
		return $temp_s3;
	}

	function searchForWords($text, $words) {
		
		$obj = new Result();
		
		$obj->_words_arr = Explode_S($text);;
		
		$obj->wanted_w = Explode_S($words);
		
		// var_dump($words);
		
		foreach($obj->_words_arr as $w) {
			
			foreach($obj->wanted_w as $s){
				// echo $w .' | ' . $s .' </br>';
				if($s === $w) {
					
					$obj->n_words++;
				}
				
			}
			
		}
		
		return $obj;
		
		return 0 ;
	}
	
?>