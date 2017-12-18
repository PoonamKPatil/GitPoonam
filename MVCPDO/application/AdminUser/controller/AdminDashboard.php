<?php
namespace Compassite\controller;

class AdminDashboard
{
	public function dashboard()
	{
		include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/admindashboard.php");
		//header("location:".APP_URL."/application/AdminUser/view/admindashboard.php");
	}
}
