<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ITS120L";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT GoalName, GoalType, StartDate, EndDate, Status FROM Goal ORDER BY StartDate DESC";
$result = $conn->query($sql);

$goals = [];
while ($row = $result->fetch_assoc()) {
    $goals[] = $row;
}

echo json_encode($goals);

$conn->close();
?>