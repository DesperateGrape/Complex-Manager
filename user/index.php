<?php

require('../system.php');

//debug_array($_REQUEST);

$action = exst($_REQUEST["action"]);

switch($action) {
	case 'login':
		verify_login($_REQUEST);
		break;
	case 'register':
		register();
		break;
	case 'create':
		create($_REQUEST);
		break;
	case 'logout':
		logout();
	default:
		login();
		break;
}

function logout() {
	session_destroy();
	header( 'Location: /beyond/' ) ;
}

function register() {
	$action = 'create';
	
	include('templates/register.php');
}

function create($frm) {
	global $system;
	$salt = mcrypt_create_iv(6, MCRYPT_DEV_RANDOM);

	$user_name = exst($frm["user_name"]);
	$password = hash('sha512', exst($frm["password"]) . $salt . $system->pepper);

	$q1 = "SELECT user_name FROM user WHERE user_name='".$frm["user_name"]."'";
	$result = $system->dbcon->db_query($q1);
	
	if($result->num_rows >= 1) {
		set_error("Username has already been taken.", "warning");
		login();
	} else {

		$q1 = "INSERT INTO user (user_name, password, salt) VALUES ('".$user_name."', '".$password."', '".$salt."')";
		echo $q1;
		
		$result = $system->dbcon->db_query($q1);
		
		//Once account is created, pass to login to login the user
		verify_login($frm);
	}
	
}

function login() {
	$action = 'login';

	include('templates/login.php');
}

function verify_login($frm) {
	global $system;
	$lsuccess = false;
	
	$user_name = exst($frm["user_name"]);
	$password = exst($frm["password"]);
	
	$q1 = "SELECT user_id, user_name, password, salt FROM user WHERE user_name='".$user_name."'";
	$result = $system->dbcon->db_query($q1);

	while($row = $system->dbcon->fetch_array($result)) {
		$password = hash('sha512', exst($frm["password"]) . $row['salt'] . $system->pepper);
		
		if($user_name==$row['user_name'] && $password == $row['password']) {
			$lsuccess = true;
			
			$_SESSION['beyond']['user']['username'] = $user_name;
			$_SESSION['beyond']['user']['user_id'] = $row['user_id'];
		}
	}

	if($lsuccess) {	
		//echo $_SESSION['beyond']['user']['username'] ." you have successfully logged in.";
		header( 'Location: /beyond/news/index.php' );

	} else {
		set_error("Unable to login", 'warning');
		login();
	}
}
