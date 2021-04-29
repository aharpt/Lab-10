<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "aaronharpt", "Vee3Cie9",
"aaronharpt");

/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query)) {
 /* fetch associative array */
 echo "<table>";
 echo "<tr>Users:</tr>";
 while ($row = $result->fetch_assoc()) {

 echo "<tr><td>" . $row["user_id"] . "</td></tr>";
 }
 echo "</table>";
 /* free result set */
 $result->free();
}

/* close connection */
$mysqli->close();
?>
