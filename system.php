<?php
class system {
	var $title;
	var $dbcon;
	var $root;
	var $media;
	var $css;
	var $js;
	var $php;
	var $images;
	function __construct() {		$this->title = "Apartment Complex";
		$this->pepper = "t#eG@!CLrKxpdv1O";
		$this->root = "";
		$this->media = $this->root."media/";
		$this->css = $this->media."css/";
		$this->js = $this->media."js/";
		$this->php = $this->media."php/";
		$this->images = $this->media."images/";
	}
}
session_start();
$system = new system();
require($system->php."dblib.php");
require($system->php."functions.php");
$system->dbcon = new dblib("localhost", "kalaithc_aptplx", "3q#ks@3GkFMIt!uT", "kalaithc_aptplx");
