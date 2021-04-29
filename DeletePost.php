<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$postsToDelete = $_POST['delete'];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "aaronharpt", "Vee3Cie9",
		"aaronharpt");
	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	foreach	($postsToDelete as $post) {
		$query = "DELETE FROM Posts WHERE content = '$post'";
		$query2 = "SELECT post_id FROM Posts WHERE content = '$post'";

		if ($result = $mysqli->query($query2)) {
			/* fetch associative array */
			while ($row = $result->fetch_assoc()) {
				echo "<p>Post with ID " . $row["post_id"] . " Deleted</p>";
			}
			/* free result set */
		$result->free();
		}

		$mysqli->query($query);

	}



	/* close connection */
	$mysqli->close();
?>
