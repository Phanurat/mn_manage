<!DOCTYPE html>
<html>
<head>
    <title>Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_login.css">
</head>
<body>
    <div class="login-container">
        <h1>Log In</h1>
        <form action="login_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Log In</button>
        </form>

        <div class="options">
            <a href="signup.php">สมัครสมาชิก</a>
            <a href="forgot-password.php">ลืมรหัสผ่าน</a>
        </div>
    </div>
</body>
</html>