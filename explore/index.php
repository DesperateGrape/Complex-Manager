<?php

require('../system.php');
require('../media/templates/header.php');
//debug_array($_POST);
$action = exst($_POST["action"]);
switch($action) {
	default:
		view_news();
		break;
}

function view_news() {

	include('templates/view_news.php');
}

/*This is just a quick refer back to side base, so I dont need to open another file if I forgot a common function name, will remove when it has its own codebase.

function register_account() {
	$action = 'create_account';

	include('templates/login.php');
}

function login() {
	$action = 'verify_login';

	include('templates/login.php');
}

function verify_login($frm) {
	global $system;

	$lsuccess = false;

	$q1 = "SELECT user_name, password FROM user WHERE user_name='".$frm["user_name"]."' AND password='".$frm["password"]."'";
	$result = $system->dbcon->db_query($q1);

	while($row = $system->dbcon->fetch_array($result)) {
		if($frm["user_name"]==$row['user_name'] && $frm["password"] == $row['password']) {
			$lsuccess = true;
			$_SESSION['beyond']['user']['username'] = $frm["user_name"];
		}
	}

	if($lsuccess) {	echo $_SESSION['beyond']['user']['username'] ." you have successfully logged in.";
		header( 'Location: /beyond/news/index.php' );

	} else {
		echo "B";

		set_error("Unable to login", 'warning');
		login();
	}
}

*/
