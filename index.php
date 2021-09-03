<?php
class StringModifyer{
	public static function revertCharacters(string $str) : string {  
         
		$special_symbols = ['!', '?', ' ', '-', '*']; 
		for ($i = 0; $i <= mb_strlen($str); $i++) {
		  
			$symbol = mb_substr( $str, $i, 1);

			if(preg_match('~^\p{Lu}~u', $symbol)) {
				$upperPos[] = $i;
			}

			if(in_array($symbol, $special_symbols)) {
				array_unshift($arr , $symbol);
				$subStrings[] = array_reverse($arr);
				$arr = [];
			} else {
				$arr[] = mb_substr( $str, $i, 1);
			}
		}
		
		$reversed_str = "";

		for ($i = 0, $i2 = 0; $i < count($subStrings); $i++) {

			for ($i1 = 0; $i1 < count($subStrings[$i]); $i1++) {

				if(in_array($i2, $upperPos)) {
					$reversed_str .= mb_strtoupper($subStrings[$i][$i1]);
				} else {
					$reversed_str .= mb_strtolower($subStrings[$i][$i1]);
				}

				$i2++;
			}

		}

		return $reversed_str;

	}
}

echo StringModifyer::revertCharacters("ПриВ-ет! Да*вно не виделИсь?");
