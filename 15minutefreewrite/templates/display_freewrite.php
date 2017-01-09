<div class = "sitetext" >
	<h1><?php echo($positions[0]["subject"]); ?></h1>
	<div id = "displayfreewrite">
	<?php 
		//$stringlist = preg_split('/(\W+)/',$positions[0]["text"],NULL, PREG_SPLIT_DELIM_CAPTURE);
		/*$stringlist = explode('/(\W+)/', $positions[0]["text"]);
		$linechars = 0;
		$cutword = false;
		for($i = 0, $n = count($stringlist); $i<$n; $i++)
		{
			/*$linechars += strlen($stringlist[$i]);
			if ($linechars >= 100 && strlen($stringlist[$i])<100)
			{
				echo "</br>".html_entity_decode($stringlist[$i]);
				$linechars = strlen($stringlist[$i]);
			}
			else if($linechars >= 100 && strlen($stringlist[$i])>100)
			{
				echo "</br>".html_entity_decode(wordwrap($stringlist[$i],100,"</br>", true));
				$linechars = strlen($stringlist[$i])%100;
				print($linechars);
			}
			else if (ctype_punct($stringlist[$i]))
			{
				echo html_entity_decode($stringlist[$i]);
			}
			else
			{
				echo ' '.html_entity_decode($stringlist[$i]);
			}
		}
		echo "</p>";*/
			/*if (strlen($stringlist[$i]) > 100)
			{
				$cutword = TRUE;
			}
		}
		
		if ($cutword)
		{
			echo("<p>".html_entity_decode(wordwrap($positions[0]["text"],100,"</br>", true))."</p>");
		}
		else
		{*/
			echo("<p>".html_entity_decode($positions[0]["text"])."</p>");
		//}
		// ended up just figuring it out using CSS word-wrap :)
		
	?>
</div>


	
	<!--wordwrap($positions[0]["text"],100,"</br>")-->