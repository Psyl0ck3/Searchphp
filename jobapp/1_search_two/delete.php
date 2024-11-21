<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybersecurity Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-image: linear-gradient(to top, #18072f, #1e0b3d, #260d4b, #2e0d59, #370d68, #370d68, #360e67, #360e67, #2d0e58, #240e48, #1d0c39, #17072b);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            color: #eaeaea;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #5e17eb, #311b92);
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #c084fc !important;
        }
        .container {
            margin-top: 50px;
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
            max-width: 600px;
        }
        h1, h2 {
            color: #0c5abb;
            text-align: center;
        }
        .btn-custom {
            background-color: #1f4068;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #162447;
        }
        .message {
            text-align: center;
            padding: 10px;
            background-color: #1f4068;
            color: #eaeaea;
            border-radius: 5px;
            margin: 20px 0;
        }
        .deleteBtn form input[type="submit"] {
            background-color: #f69697;
            border: solid 1px #f69697;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            color: white;
        }
        .deleteBtn form input[type="submit"]:hover {
            background-color: #e36d6d;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cybersecurity Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../2_login_with_response/core/handleForms.php?logoutUserBtn=1">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Are you sure you want to delete this user?</h1>
        <?php $getUserByID = getUserByID($pdo, $_GET['id']); ?>
        <h2>Full Name: <?php echo $getUserByID['Full_Name']; ?></h2>
        <h2>Email: <?php echo $getUserByID['Email']; ?></h2>
        <h2>Phone: <?php echo $getUserByID['Phone']; ?></h2>
        <h2>Specialization: <?php echo $getUserByID['Specialization']; ?></h2>
        <h2>Years of Experience: <?php echo $getUserByID['Years_of_Experience']; ?></h2>
        <h2>Certifications: <?php echo $getUserByID['Certifications']; ?></h2>
        <div class="deleteBtn">
            <form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <input type="submit" name="deleteUserBtn" value="Delete" class="btn-custom">
            </form>			
        </div>	
    </div>
</body>
</html>
