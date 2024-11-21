<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(to bottom, #18072f, #1e0b3d, #260d4b, #2e0d59, #370d68);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            color: #eaeaea;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .login-box {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 400px;
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
            color: #bb86fc;
        }
        .form-control {
            background-color: transparent;
            border: 1px solid #bb86fc;
            color: #ffffff;
        }
        .form-control:focus {
            background-color: transparent;
            box-shadow: none;
			color: #ffffff;
            border-color: #6200ea;
        }
        .btn-custom {
            background-color: #bb86fc;
            color: #121212;
            font-weight: bold;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #6200ea;
            color: #ffffff;
        }
        a {
            color: #f8f9fa;
            text-decoration: underline;
        }
        a:hover {
            color: #bb86fc;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Welcome Back!</h2>
        <?php  
        if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
            $alertClass = $_SESSION['status'] == "200" ? "text-success" : "text-danger";
            echo "<p class='text-center fw-bold $alertClass'>{$_SESSION['message']}</p>";
            unset($_SESSION['message']);
            unset($_SESSION['status']);
        }
        ?>
        <form action="core/handleForms.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" name="loginUserBtn" class="btn btn-custom">Log In</button>
            </div>
        </form>
        <p class="text-center">
            Don't have an account? <a href="register.php">Register here</a>.
        </p>
    </div>
</body>
</html>
