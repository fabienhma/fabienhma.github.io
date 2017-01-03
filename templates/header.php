<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../public/css/WebsiteStyle.css">
	<?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Fabien Ma</title>
    <?php endif ?>
</head>
<body>
	<div id = "upper-panel">
		<ul>
			<li><a href="index.php"><img class="logo" src="http://res.cloudinary.com/hrscywv4p/image/upload/c_limit,h_540,w_720/ycqi7rkpm8xn8ecflhna.jpg"></a></li>
			<li><a href="aboutproj.php">About Project</a></li>
			<li><a href="aboutme.php">About Me</a></li>
			<li><a href="projects.php">Projects</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</div> 
        