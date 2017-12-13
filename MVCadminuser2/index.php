<?php

session_start();

require __DIR__.'/vendor/autoload.php';


define("APP_URL", 'http://localhost/Php-Programs/MVCadminuser2');

define("USERROLEID", 2);

define("ADMINROLEID", 1);

define("INACTIVE", 0);

define("ACTIVE", 1);


if($_GET['page']=='login'){
	$viewObj = new Compassite\controller\AdminController();
	$viewObj->loginValidation();
}
if($_GET['page']=='dashaboard'){
	$viewObj = new Compassite\controller\AdminDashboard();
	$viewObj->dashboard();
}

if($_GET['page']=='listuser'){
	$viewObj = new Compassite\controller\AdminController();
	$viewObj->updateUser();
}

if($_GET['page']=='changepwd'){
	$viewObj = new Compassite\controller\AdminController();
	$viewObj->adminChangePassword();
}

if($_GET['page']=='viewprofile'){
	$viewObj = new Compassite\controller\UserController();
	//$viewObj->getUsers();
}

if($_GET['page']=='editprofile'){
	$viewObj = new Compassite\controller\UserController();
	$viewObj->getUsers();
}