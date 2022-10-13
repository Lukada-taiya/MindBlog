<?php 
session_start();
function error_message() {
	if(isset($_SESSION['error-message'])) {
		$output = "<div class='alert alert-danger'>";
		$output.= $_SESSION['error-message'];
		$output.= "</div>";
		$_SESSION['error-message'] = null;
		return $output;
	}
}
function success_message() {
	if(isset($_SESSION['success-message'])) {
		$output = "<div class='alert alert-success'>";
		$output.= $_SESSION['success-message'];
		$output.= "</div>";
		$_SESSION['success-message'] = null;
		return $output;
	}
}
?>
