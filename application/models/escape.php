<?php 
function ldap_escaped ($str = '') {
	    $str = substr($str, 0, strlen($str));
	    $metaChars = array ("(", ")");
	    $quotedMetaChars = array ();
	    foreach ($metaChars as $key => $value) {
	    $quotedMetaChars[$key] = '\\'. dechex (ord ($value));
	    }
	    $str = str_replace (
	        $metaChars, $quotedMetaChars, $str
	    ); 
	    return ($str);
	}
 ?>