<?php
	// TODO: generate random topics at the push of a button (probably javascript?)
	require("../includes/config.php");

	//if user reached paged via GET (i.e. clicked a link to get here), render page!
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		render("freewrite_page.php");
	}
	else if (($_SERVER["REQUEST_METHOD"] == "POST") && !empty($_SESSION["id"]))
	{
		// TODO: store information in portfolio, if logged in.
		$textformatted = nl2br($_POST["txtarea"]);
		query("INSERT INTO `portfolio` (id, subject, text, datetime) VALUES (?, ?, ?, CURRENT_TIMESTAMP)", $_SESSION["id"], htmlspecialchars($_POST["subject"]), htmlspecialchars($textformatted));

		render("freewrite_done_user.php");
		
	}
	else if (($_SERVER["REQUEST_METHOD"] == "POST") && empty($_SESSION["id"]))
	{
		if(empty($_POST["email"])&& !empty($_POST["subject"]))
		{
			$textformatted = nl2br(($_POST["txtarea"]));
			query("INSERT INTO `guest_crap` (subject, text) VALUES (?, ?)", htmlspecialchars($_POST["subject"]),$textformatted);
			render("freewrite_done_guest.php");
			echo $textformatted;
		}
		else if(!empty($_POST["email"]))
		{
			if(strpos($_POST["email"],'@')===FALSE || strpos($_POST["email"],'.')===FALSE)
			{
				apologize("Please enter a valid email");
			}
			else
			{
				$guest_freewrite = query("SELECT * FROM `guest_crap`");

				// from PHP Mailer
				$to = htmlspecialchars($_POST["email"]);
				$name = htmlspecialchars($_POST["name"]);
				$subject = htmlspecialchars($guest_freewrite[0]["subject"]);
				$msg = wordwrap($guest_freewrite[0]["text"]);

				sendEmail($to, $name, $subject, $msg);
				query("TRUNCATE `guest_crap`"); 
			}
		}

	}
?>