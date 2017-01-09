<div class = "sitetext">
	<div style = "text-align: center">
		<table style = "width: 100%; display: table; font-size: 14px; font-family: Helvetica; line-height: 1.43; color: #333;">
    		<tr style = "font-size: 15px; font-weight: bold">
        		<td>       Subject      </td>
        		<td>       Date + Time      </td>
        		<td> 	   Link  			</td>
                <td>       Email            </td>
                <td>       Delete?          </td>
    </tr>
    <?php foreach ($positions as $position): ?>
        <tr>
            <td><?= $position["subject"] ?></td>
            <td><?= $position["datetime"] ?></td>
            <td>
            	<?php echo('<a href="render_writing.php?q='.$position["datetime"].'">View Here!</a>'); ?>
            </td>
            <td>
                <?php echo('<a href="email_toself.php?q='.$position["datetime"].'">Send to self!</a>'); ?>
            </td>
            <td>
                <?php echo('<a href= "delete_freewrite.php?q='.$position["datetime"].'"onclick="return confirm_delete()" >Delete</a>'); ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>
</div>
<a href="../public/freewrite.php"> Start Writing! </a>
<script>
    function confirm_delete(){
            var confirmDelete = confirm("Delete freewrite?  This cannot be undone")
            return confirmDelete;
        }
</script>