<?php
    // configuration
    require("../includes/config.php"); 

	error_reporting(E_ALL & ~E_WARNING);

    // log out current user, if any
    logout();
    render("logged_out.php",["title"=> "Logged Out!"]);
?>