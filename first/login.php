<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Lia's Library</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">Library</div>
            <nav>
                <ul>
                    <li><a href="homepage.php">Homepage</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="homepage.php" class="btn btn-signup">Our Books</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="login.php" class="btn">Log in</a></li>
                    <li><a href="register.php" class="btn btn-signup">Sign up </a></li>
                </ul>
            </nav>
     </div>
        </header>
</body>
<div class="login-container">
    <h2>Login</h2>
    <form>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username"required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"required>
        </div>
        <button type="submit" class="login-btn">Login</button>
        <br>
        <br>
            <div class="register">
            Dont have an account? <a href="register.php">Sign up</a>
        </div>