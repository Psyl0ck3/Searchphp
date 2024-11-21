<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(to bottom, #18072f, #1e0b3d, #260d4b, #2e0d59, #370d68);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            color: #eaeaea;
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #1e1e2f;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #c084fc;
        }
        label {
            font-weight: bold;
        }
        .form-control {
            background-color: #2c2c3f;
            color: #eaeaea;
            border: 1px solid #5e17eb;
        }
        .form-control:focus {
            background-color: #2c2c3f;
            border-color: #c084fc;
            box-shadow: none;
        }
        .btn-custom {
            background-color: #5e17eb;
            color: white;
            border: none;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #311b92;
        }
        .message {
            text-align: center;
            padding: 10px;
            background-color: #1f4068;
            color: #eaeaea;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        a {
            color: #c084fc;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h1>Register Here</h1>
            <?php  
            if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
                $color = $_SESSION['status'] == "200" ? "green" : "red";
                echo "<div class='message' style='color: {$color};'>{$_SESSION['message']}</div>";
                unset($_SESSION['message']);
                unset($_SESSION['status']);
            }
            ?>

            <form action="core/handleForms.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <button type="submit" name="insertNewUserBtn" class="btn btn-custom">Register</button>
            </form>

            <p class="mt-3 text-center">
                Already have an account? <a href="login.php">Login here</a>
            </p>
        </div>
    </div>
</body>
</html>
