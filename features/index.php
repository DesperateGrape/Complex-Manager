<?php
require('../system.php');
require('../media/templates/header.php');
//debug_array($_REQUEST);
$action = exst($_REQUEST["action"]);

switch($action) {
	case 'list_features':
		list_features();
		break;
	case 'list_finished_features':
		list_finished_features();
		break;
	case 'add_feature':
		add_feature($_REQUEST);
		break;
	case 'create_feature':
		create_feature($_REQUEST);
		break;
	case 'modify_feature':
		modify_feature($_REQUEST);
		break;
	case 'edit_feature':
		edit_feature($_REQUEST);
		break;
	default:
		list_features();
		break;
}

function list_features() {
	global $system;

	$q1 = "SELECT feature_request_id, name, description, hours, rank, points, status FROM feature_request WHERE status=1 ORDER BY points DESC";
	$result = $system->dbcon->db_query($q1);

	include('templates/list_features.php');
}

function list_finished_features() {
	global $system;
	$q1 = "SELECT feature_request_id, name, description, hours, rank, points, status FROM feature_request WHERE status=9 ORDER BY points";
	$result = $system->dbcon->db_query($q1);

	include('templates/list_features.php');
}


function add_feature($frm) {	global $system;

	$action = "create_feature";
	include('templates/add_feature.php');
}

function create_feature($frm) {
	global $system;
	$q1 = "INSERT INTO feature_request (name, description, hours, rank, points, status) VALUES ('".$frm["name"]."', '".$frm["description"]."', '".$frm["hours"]."', '".$frm["rank"]."', '".$frm["points"]."', '".$frm["status"]."')";
	$result = $system->dbcon->db_query($q1);
	list_features();
}

function modify_feature($frm) {
	global $system;
	$action = "edit_feature";
	$feature_request_id = exst($frm["feature_request_id"]);
	$q1 = "SELECT feature_request_id, name, description, hours, rank, points, status FROM feature_request WHERE feature_request_id=".$feature_request_id."";
	$result = $system->dbcon->db_query($q1);
	$frm = $system->dbcon->fetch_array($result);
	debug_array($frm);
	include('templates/add_feature.php');
}

function edit_feature($frm) {
	global $system;
	$q1 = "UPDATE feature_request SET name='".$frm["name"]."', description='".$frm["description"]."', hours='".$frm["hours"]."', rank='".$frm["rank"]."', points='".$frm["points"]."', status='".$frm["status"]."' WHERE feature_request_id='".$frm["feature_request_id"]."'";
	$result = $system->dbcon->db_query($q1);

	list_features();
}