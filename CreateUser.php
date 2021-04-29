<?php
	$user = $_POST["user"];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "aaronharpt", "Vee3Cie9",
	"aaronharpt");

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}


	$query2 = "SELECT user_id FROM Users";
	$isIdentical = False;

	if ($result = $mysqli->query($query2)) {
	/* fetch associative array */
	 while ($row = $result->fetch_assoc()) {
		if ($row["user_id"] == $user) {
			$isIdentical = True;
		}
	}
	/* free result set */
	$result->free();
	}

	if ($user != "" && $isIdentical == False) {
		$query = "INSERT INTO Users (user_id) VALUES ('" . $user . "')";
		$mysqli->query($query);
		echo "<p>" . $user . " added</p>";
	} else if ($user == "") {
		echo "<p>A blank string is not a valid username, please try again.</p>";
	} else if ($isIdentical) {
		echo "<p>" . $user . " is already in the database as a registered user.  Duplicates are not allowed.</p>";
	}

	$mysqli->close();
?>
