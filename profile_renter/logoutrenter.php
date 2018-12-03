<?php

session_start();
session_destroy();

	header('location:loginRenter.php');
	exit();
?>