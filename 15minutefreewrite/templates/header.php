<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../public/css/WebsiteStyle.css">
	<?php if (isset($title)): ?>
            <title>15 Minute Freewrites: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>15 Minute Freewrites</title>
    <?php endif ?>
</head>
<body>
	<div id = "upper-panel">
		<h1> 15 Minute Freewrites! </h1>
		<p> The general idea: Set the timer, pick a topic (or make your own), start the timer, 
		start writing! </br>The goal is to write whatever comes to mind, no matter how silly,
		and free yourself from the fear of judgment.  </p>
	</div> 
        