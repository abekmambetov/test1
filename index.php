<?php
class StringModifyer{
	public static function revertCharacters(string $str) : string {  

		for ($i = 0; $i <= mb_strlen($str); $i++) {
		  $arr[] = mb_substr( $str, $i, 1);
		}
		
		$reversed_arr = array_reverse($arr);
		
		$reversed_str = "";
		for ($i = 0; $i < count($reversed_arr); $i++) {
		  $reversed_str .= $reversed_arr[$i];
		}
		return $reversed_str;

	}
}

echo StringModifyer::revertCharacters("Привет! Давно не виделись.");
