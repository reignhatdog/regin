<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "user_db"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = isset($_POST["fullname"]) ? $conn->real_escape_string(trim($_POST["fullname"])) : "";
    $email = isset($_POST["email"]) ? $conn->real_escape_string(trim($_POST["email"])) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
    $confirm_password = isset($_POST["confirm_password"]) ? trim($_POST["confirm_password"]) : "";
    

    $valid = true;
    

    if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password)) {
        $message = "All fields are required";
        $valid = false;
    }
    

    elseif ($password !== $confirm_password) {
        $message = "Passwords do not match";
        $valid = false;
    }
    

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address";
        $valid = false;
    }

    if ($valid) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        

        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($check_email);
        
        if ($result->num_rows > 0) {
            $message = "Email already exists. Please use a different email or login.";
        } else {
          

            $sql = "INSERT INTO users (fullname, email, password) 
                    VALUES ('$fullname', '$email', '$hashed_password')";
            
            if ($conn->query($sql) === TRUE) {
                $message = "Registration successful!.";
            } else {
                $message = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Lia's Library</title>
</head>
<body>
    <div class="container">
    <header>
        <div class="logo">Library</div>
            <nav>
                <ul>
                    <li><a href="register.php">Homepage</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="register.php" class="btn btn-signup">Our Books</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="login.php" class="btn">Sign in</a></li>
                    <li><a href="register.php" class="btn btn-signup">Sign up</a></li>
                </ul>
            </nav>
    </div>
    </header>

    <br>
    <br>
    <br>
    <div class="form-container">
        <br>
        <br>
        <h2>Create an Account</h2>
        
        <?php


// Simulate user registration logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and validate user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Save to database (this part is just a mock)
    // You would normally hash the password and insert into DB here

    // Simulate a successful registration
    $registration_success = true;

    if ($registration_success) {
        // Redirect to login page
        header("Location: login.php");
        exit(); // Always call exit after header redirect
    } else {
        echo "Registration failed. Try again.";
    }
}
?>
        
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="fullname">Username</label>    
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <br>
            <button type="submit">Register</button>
        </form>
        
        <div class="login-link">
            Already have an account? <a href="login.php">Log in</a>
        </div>
    </div>
</body>
</html>