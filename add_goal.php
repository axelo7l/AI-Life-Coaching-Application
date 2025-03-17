<?php
session_start(); // Start the session to access session variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ITS120L";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve UserID from session instead of POST
    if (!isset($_SESSION['UserID']) || empty($_SESSION['UserID'])) {
        die("Error: UserID is missing from session!");
    }

    $userID = $_SESSION['UserID']; // Use the session-stored UserID
    $goalName = $_POST['goalName'] ?? '';
    $goalType = $_POST['goalType'] ?? '';
    $startDate = $_POST['startDate'] ?? '';
    $endDate = $_POST['endDate'] ?? NULL;
    $status = $_POST['status'] ?? '';

    // Debugging: Check if required fields are empty
    if (empty($goalName) || empty($goalType) || empty($startDate) || empty($status)) {
        die("Error: All required fields must be filled!");
    }

    // Check if user exists in the database
    $checkUser = $conn->prepare("SELECT UserID FROM users WHERE UserID = ?");
    $checkUser->bind_param("i", $userID);
    $checkUser->execute();
    $result = $checkUser->get_result();

    if ($result->num_rows == 0) {
        die("Error: UserID does not exist in the users table!");
    }
    $checkUser->close();

    // Insert into goal table
    $stmt = $conn->prepare("INSERT INTO goal (UserID, GoalName, GoalType, StartDate, EndDate, Status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $userID, $goalName, $goalType, $startDate, $endDate, $status);

    if ($stmt->execute()) {
        echo "Goal added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>