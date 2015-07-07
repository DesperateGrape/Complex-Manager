<?php

if(isset($_SESSION['beyond'])) {
	header( 'Location: news/index.php' );
} else {
	header( 'Location: user/index.php' );
}