<?php 

	session_start();

	if (isset($_POST['submit'])) {

		$message = $_POST['message'];
		$token = strtolower($_POST['token']);

		// validate captcha code 		
		if (isset($_SESSION['captcha_token']) && $_SESSION['captcha_token'] == $token) {

			//success your code here
			echo "success";

		} else {
			echo "error CAPTCHA code";
		}
		
	}
?>