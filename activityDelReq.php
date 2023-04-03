<?php
require_once('conn.php');
// $conn = mysqli_connect('localhost:3306', 'root', '', 'hackveda_tmheart');
// $mysqli = mysqli_connect('hackveda.in', 'hackveda_yashchandra', 'Tz+aZwCrgjv,', 'hackveda_tmheart');
$actTable = $_POST['ActTable'];
$Act_id = $_POST['Act_id'];
$sql = "DELETE FROM $actTable WHERE id = $Act_id";
$conn->query($sql);
$conn->close();
echo "<h1>Deleted Successfully</h1><br>";
echo "<h1><a href='adminDashboard.php'>Back to dashboard</a></h1><br>";
exit();
?>