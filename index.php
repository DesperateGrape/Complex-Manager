<?php

if(isset($_SESSION['aptplex'])) {
	header( 'Location: news/index.php' );
} else {
	header( 'Location: user/index.php' );
}