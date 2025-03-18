<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="en">
    <head> 
        <link rel="stylesheet" href="/AI-Life-Coaching-Application/login.css" type="text/css">
        <title> Register </title>
    </head>
<body>
    <div class="body-register">
    <form method = "POST">
        
        <div class="center">
            <br><h1> Register </h1>
        </div>

        <div class="login">
            
            <label for="fname"> First Name </label><br><br>
            <input type="text" id="fname" name="fname" class="input-register" placeholder="First Name" required><br><br>
            
            <label for="lname"> Last Name </label><br><br>
            <input type="text" id="lname" name="lname" class="input-register" placeholder="Last Name" required><br><br> 
            
            <label for="email"> Email </label><br><br>
            <input type="email" id="email" name="email" class="input-register" placeholder="Enter Email Address" required><br><br> 

            <label for="password"> Password </label><br><br>
            <input type="text" id="password" name="password" class="input-register" placeholder="Enter Password" required><br><br> 

            <label for="confirmpassword"> Confirm Password </label><br><br>
            <input type="text" id="confirmpassword" name="confirmpassword" class="input-register" placeholder="Enter Password" required><br><br> 

            <label for="contactnumber"> Contact Number </label><br><br>
            <input type="number" id="contactnumber" name="contactnumber" class="input-register" placeholder="09XXXXXXXXX" required><br><br> 

            <div class="center">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        // Database connection details
                        $servername = "localhost";
                        $username = "root"; // Default username for localhost
                        $password = ""; // Default password for localhost
                        $dbname = "ITS120L"; // Replace with your database name

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
     
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Get form data
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $confirmpassword = $_POST['confirmpassword'];
                        $contactnumber = $_POST['contactnumber'];

                        if ($password == $confirmpassword) {
                            $checkemail = $conn->prepare("SELECT COUNT(*) FROM user WHERE Email = ?");
                            $checkemail->bind_param("s", $email);
                            $checkemail->execute();
                            $checkemail->bind_result($count);
                            $checkemail->fetch();
                            $checkemail->close();

                            if ($count > 0) {
                                echo "The email is already being used.";
                            } else {
                                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                // SQL query to insert new user into the database
                                $sql = "INSERT INTO user (FirstName, LastName, Email, Password) VALUES ('$fname', '$lname', '$email', '$password')";

                                if ($conn->query($sql) === TRUE) {
                                    echo "Registration successful!";
                                    header("Location: ../login.php");
                                    } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                        } else {
                            echo "Passwords do not match.";
                        }
                    }
                ?>
            </div>
            
            <button type="submit" class="button">Register</button> <br> <br> <br>

        </div>

        
        
    </form>
    </div>
</body>
</html>

<?php
require 'db_connection.php'; // Ensure this file connects to your database

$sql = "SELECT * FROM goal WHERE UserID = " . $_SESSION['UserID'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<h1>" . htmlspecialchars($row['GoalName']) . "</h1>";
        echo "<h2>" . htmlspecialchars($row['GoalType']) . "</h2>";
        echo "<p>Start: " . htmlspecialchars($row['StartDate']) . " | End: " . htmlspecialchars($row['EndDate']) . "</p>";
        echo "<p>Status: " . htmlspecialchars($row['Status']) . "</p>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No goals found.</p>";
}

$conn->close();
?>