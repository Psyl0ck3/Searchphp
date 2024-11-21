<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
        h1 {
            color: #c084fc;
            text-align: center;
        }
        .form-control {
            background-color: #333;
            color: #eaeaea;
            border: 1px solid #444;
        }
        .form-control:focus {
            background-color: #444;
            border-color: #0c5abb;
            color: #eaeaea;
        }
        .btn-custom {
            background-color: #c084fc;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #162447;
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
        <h1>Edit the User</h1>

        <?php $getUserByID = getUserByID($pdo, $_GET['id']); ?>

        <!-- Form for editing the user -->
        <form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="Full_Name" class="form-label">Full Name</label>
                <input type="text" name="Full_Name" class="form-control" value="<?php echo htmlspecialchars($getUserByID['Full_Name']); ?>">
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" name="Email" class="form-control" value="<?php echo htmlspecialchars($getUserByID['Email']); ?>">
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone</label>
                <input type="text" name="Phone" class="form-control" value="<?php echo htmlspecialchars($getUserByID['Phone']); ?>">
            </div>
            <div class="mb-3">
                <label for="Specialization" class="form-label">Specialization</label>
                <input type="text" name="Specialization" class="form-control" value="<?php echo htmlspecialchars($getUserByID['Specialization']); ?>">
            </div>
            <div class="mb-3">
                <label for="Years_of_Experience" class="form-label">Years of Experience</label>
                <input type="text" name="Years_of_Experience" class="form-control" value="<?php echo htmlspecialchars($getUserByID['Years_of_Experience']); ?>">
            </div>
            <div class="mb-3">
                <label for="Certifications" class="form-label">Certifications</label>
                <input type="text" name="Certifications" class="form-control" value="<?php echo htmlspecialchars($getUserByID['Certifications']); ?>">
            </div>
            <div class="mb-3 text-center">
                <input type="submit" name="editUserBtn" value="Save" class="btn btn-custom">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
