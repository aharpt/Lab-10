<?php
$user = $_POST["username"];
$post = $_POST["post"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "aaronharpt", "Vee3Cie9",
"aaronharpt");

/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
$query = "SELECT user_id FROM Users";
$isValidUser = False;

if ($result = $mysqli->query($query)) {
 /* fetch associative array */
 while ($row = $result->fetch_assoc()) {
 if ($row["user_id"] == $user) {
	$isValidUser = True;
 }
 // printf ("%s \n", $row["user_id"]);
 }
 /* free result set */
 $result->free();
}

if ($post != "" && $isValidUser) {
	$query2 = "INSERT INTO Posts (author_id, content) VALUES('" . $user . "', '" . $post . "')";
	$mysqli->query($query2);
	echo "<p>" . $post . " saved by ". $user . "</p>";
} else if ($post == "") {
	echo "<p>Blank post not saved to database.</p>";
} else if (!($isValidUser)) {
	echo "<p>" . $user . " is not a registered user in our database so post could not be saved.</p>";
}

/* close connection */
$mysqli->close();
?>
