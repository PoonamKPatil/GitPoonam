<?php
namespace Compassite\controller;

class AdminDashboard
{
	public function dashboard()
	{
		header("location:".APP_URL."/application/AdminUser/view/admindashboard.php");
	}
}
