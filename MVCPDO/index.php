<?php

session_start();

require __DIR__.'/vendor/autoload.php';

define("APP_URL", 'http://localhost/Php-Programs/MVCPDO');


//admin

if ($_GET['page'] == 'login') {

	$viewObj = new Compassite\controller\AdminController();

	$viewObj->loginValidation();

}

if ($_GET['page'] == 'dashaboard') {

	$viewObj = new Compassite\controller\AdminDashboard();

	$viewObj->dashboard();

}

if ($_GET['page'] == 'listuser') {

	$adminObj = new Compassite\controller\AdminController();

	$adminObj->listUsers();

}

if ($_GET['page'] == 'user') {
	
	if ($_POST['action']=='delete') {

	    $adminObj = new Compassite\controller\AdminController();

	    $adminObj->deleteUser();

    }

    if ($_POST['action'] == 'disable') {

	    $adminObj = new Compassite\controller\AdminController();

	    $adminObj->disableUser();

    }

    if ($_POST['action'] == 'enable') {

	    $adminObj = new Compassite\controller\AdminController();

	    $adminObj->enableUser();

    }
    
}


if ($_GET['page'] == 'changepwd') {

	$viewObj = new Compassite\controller\AdminController();

	$viewObj->adminChangePassword();

}

if ($_GET['page'] == 'edituser') {

	$viewObj = new Compassite\controller\AdminController();

	$viewObj->editUser();

}


//user

if ($_GET['page'] == 'registeruser') {

	$viewObj = new Compassite\controller\UserController();

	$viewObj->registerUser();

}

if ($_GET['page'] == 'userlogin') {

	$viewObj = new Compassite\controller\UserController();

	$viewObj->loginValidation();

}

if ($_GET['page'] == 'userdashboard') {

	$viewObj = new Compassite\controller\UserDashboard();

	$viewObj->dashboard();

}

if ($_GET['page'] == 'viewprofile') {

	$viewObj = new Compassite\controller\UserController();

	$viewObj->viewProfile();

}

if ($_GET['page'] == 'editprofile') {

	$viewObj = new Compassite\controller\UserController();

	$viewObj->editUser();

}

if ($_GET['page'] == 'userchangepwd') {

	$viewObj = new Compassite\controller\UserController();

	$viewObj->userChangePassword();

}

if ($_GET['page'] == 'logout') {

	$viewObj = new Compassite\controller\LogoutController();

	$viewObj->logout();

}

if ($_GET['page'] == 'home') {

	$viewObj = new Compassite\controller\HomeController();

	$viewObj->welcome();

}