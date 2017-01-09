<?php
	require("../includes/config.php");
    $datetime = str_replace("%20"," ",substr(("$_SERVER[REQUEST_URI]"), -21, 21));
	
    $rows = query("SELECT * FROM `portfolio` WHERE id = ? AND datetime = ?", $_SESSION["id"], $datetime);
    if (empty($rows))
    {
        apologize("Broken Link");
    }
    else
    {
       $positions = [];
        foreach ($rows as $row)
            {
                $positions[] = [
                "subject" => $row["subject"],
                "text" => $row["text"]
                ];
            }
        render("display_freewrite.php", ["positions" => $positions]); 
    }
	
?>