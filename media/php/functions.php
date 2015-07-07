<?php

// USER ERROR / INFORMATION FUNCTIONS
function set_error($error, $importance) {
	
	$_SESSION['beyond']['error'][$importance] = $error;
}

function display_warnings() {
	if(isset($_SESSION['beyond']['error']['warning'])) {
		echo $_SESSION['beyond']['error']['warning'];
		unset($_SESSION['beyond']['error']['warning']);
	}
}

// UTILLITY FUNCTIONS
function exst( & $var, $default = "")
{
    $t = "";
    if ( !isset($var)  || !$var ) {
        if (isset($default) && $default != "") $t = $default;
    }
    else  {  
        $t = $var;
    }
    if (is_string($t)) $t = trim($t);
    return $t;
}

// DEBUG FUNCTIONS
function debug_array($array) {
	echo "<pre>";
	echo print_r($array);
	echo "</pre>";
}