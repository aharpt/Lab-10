<?php
	$user = $_POST['user'];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "aaronharpt", "Vee3Cie9",
	"aaronharpt");
	/* check connection */
	if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
	}
	$query = "SELECT content, post_id FROM Posts WHERE author_id = '$user'";
	if ($result = $mysqli->query($query)) {
	echo "<table><tr>Posts: </tr>";

	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>Post ID: " . $row["post_id"] . ": </td>";
		echo "<td>Post Content: " . $row["content"] . "</td>";
		echo "</tr>";
	}

	echo "</table>";
	/* free result set */
	$result->free();
	}
	/* close connection */
	$mysqli->close();
	?>
