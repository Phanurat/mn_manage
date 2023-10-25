<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_signup.css">
</head>
<body>
    
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form action="signup_process.php" method="post">
            <label for="userid">UserID:</label>
            <input type="text" id="userid" name="userid" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Sign Up</button>
        </form>

        <div class="options">
            <a href="login.php">ย้อนกลับไปที่หน้า Log In</a>
        </div>
    </div>
</body>
</html>
