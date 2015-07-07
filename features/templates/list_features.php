<table>
<tr>
	<th>ID #</th>
	<th>Name</th>
	<th>Description</th>
	<th>Estimated Time (Hours)</th>
	<th>Rank</th>
	<th>Points</th>
	<th>Status</th>
	<th>Edit</th>
</tr>
<?php

	if($system->dbcon->no_of_rows($result) > 0) {
		while($row = $system->dbcon->fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['feature_request_id']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['description']."</td>";
			echo "<td>".$row['hours']."</td>";
			echo "<td>".$row['rank']."</td>";
			echo "<td>".$row['points']."</td>";
			echo "<td>".$row['status']."</td>";
			echo "<td><a href='/beyond/features/index.php?action=modify_feature&feature_request_id=".$row['feature_request_id']."'>Modify</a></td>";
			echo "</tr>";
		}
	} else {
		echo "<tr><td colspan=7>No Features found, request some!</td></tr>";
	}
?>
</table>
<a href='/beyond/features/index.php?action=add_feature'>Request a new feature</a>
