<?php
	// TODO: Logged in page: portfolio.  Need a page that displays previous freewrites, too
	require("../includes/config.php");

	if (empty($_SESSION["id"]))
	{
		render("login_form.php");
	}
	else
	{
		$userinfo = query("SELECT username FROM `users` WHERE id = ?", $_SESSION["id"]);
        $rows = query("SELECT * FROM `portfolio` WHERE id = ?", $_SESSION["id"]);
        $positions = [];
        foreach ($rows as $row)
        {
            $positions[] = [
            "subject" => $row["subject"],
            "datetime" => $row["datetime"]
            ];
        }

		render("portfolio.php", ["positions" => $positions]);
	}
?>