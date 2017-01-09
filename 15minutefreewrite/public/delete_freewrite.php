<?php
	require("../includes/config.php");
	$datetime = str_replace("%20"," ",substr(("$_SERVER[REQUEST_URI]"), -21, 21));

	$rows = query("SELECT * FROM `portfolio` WHERE id = ? AND datetime = ?", $_SESSION["id"], $datetime);
    if (empty($rows))
    {
        apologize("Freewrite doesn't exist!");
    }
    else
    {
    	query("DELETE FROM `portfolio` WHERE id = ? AND datetime = ?", $_SESSION["id"], $datetime);
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