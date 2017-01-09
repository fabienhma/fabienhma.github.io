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
       $positions = [];
        foreach ($rows as $row)
            {
                $positions[] = [
                "subject" => $row["subject"],
                "text" => $row["text"]
                ];
            }

        $userinfo = query("SELECT * FROM `users` WHERE id = ?", $_SESSION["id"]);

        $to = $userinfo[0]["email"];
		$name = $userinfo[0]["username"];
		$subject = htmlspecialchars($positions[0]["subject"]);
		$msg = wordwrap(($positions[0]["text"]));

		sendEmail($to, $name, $subject, $msg);
    }

?>