<?php
session_start();
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="en">
    <head> 
        <link rel="stylesheet" href="/AI-Life-Coaching-Application/login.css" type="text/css">
        <title> Login </title>
    </head>
<body>
    <div class="body-login">
    <form method = "POST">
        
        <div class="center">
            <br><h1> Login </h1>
        </div>

        <div class="login">
            

            
            <label for="email"> Email </label><br><br>
            <input type="email" id="email" name="email" class="input-login" placeholder="Enter Email Address" required><br>

            <br><br>

            <label for="password"> Password </label><br><br>
            <input type="password" id="password" name="password" class="input-login" placeholder="Enter Password" required><br>

            <br><br>

            <button type="submit" class="button">Sign In</button>

            <br><br>

            <a href=""> Forgot Password? </a>

            <br><br>

            


        </div>

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
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // SQL query to check if the user exists
        $sql = "SELECT * FROM Users WHERE Email='$email' AND Password='$password'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // User found, login successful
            echo "Login successful!";
            
            while($row = $result->fetch_assoc()) {
                $_SESSION["UserID"] = $row["UserID"];
                $_SESSION["FirstName"] = $row["FirstName"];
            }


            // You can redirect the user to another page here
            header("Location: home.php");
        } else {
            // User not found, login failed
            echo "Invalid username or password.";
        }
        
        // Close connection
        $conn->close();
    }
?>
</div>

        <div class="center">
            <p> Not Registered? <a href='http://localhost/AI-Life-Coaching-Application/register.php/'> Sign Up Now </a> </p> 
        </div>
        
    </form>
    </div>
</body>
</html>