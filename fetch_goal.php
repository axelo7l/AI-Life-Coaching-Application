<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ITS120L";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$UserID = $_SESSION['UserID']; // Ensure session UserID is set

// Prepare the statement before binding parameters
$sql = "SELECT GoalName, GoalType, StartDate, EndDate, Status 
        FROM Goal 
        WHERE UserID = ? 
        ORDER BY StartDate DESC";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("i", $UserID); // Bind UserID as integer
$stmt->execute();

$result = $stmt->get_result();

$goals = [];
while ($row = $result->fetch_assoc()) {
    $goals[] = $row;
}

echo json_encode($goals);

$stmt->close();
$conn->close();
?>