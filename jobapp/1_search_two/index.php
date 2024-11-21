<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybersecurity Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background-color: #0d1117;
            color: #eaeaea;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
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

        .table {
            background-color: #1f2937;
            color: #eaeaea;
            border-radius: 10px;
            overflow: hidden;
        }
        .table th {
            background-color: #4c1d95;
            color: #ffffff;
        }
        .table tbody tr:nth-child(even) {
            background-color: #2c2f33;
        }
        .table tbody tr:hover {
            background-color: #4c1d95;
            color: #ffffff;
        }

        .btn-custom {
            background-color: #5e17eb;
            color: white;
            border: none;
            transition: 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #311b92;
            color: #ffffff;
        }
        .btn-danger {
            background-color: #ff5c5c;
        }
        .btn-danger:hover {
            background-color: #ff3b3b;
        }
/
        .form-control {
            background-color: #2c2f33;
            color: #eaeaea;
            border: 1px solid #5e17eb;
        }
        .form-control:focus {
            background-color: #2c2f33;
            border-color: #c084fc;
            box-shadow: none;
            color: #ffffff;
        }

        .message {
            background-color: #311b92;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
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

    <div class="container mt-4">

        <?php if (isset($_SESSION['message'])) { ?>
            <div class="message">
                <?php echo $_SESSION['message']; ?>
            </div>
        <?php } unset($_SESSION['message']); ?>


        <div class="mb-4">
            <a href="insert.php" class="btn btn-custom">Insert New User</a>
        </div>


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET" class="d-flex mb-3">
            <input class="form-control me-2" type="text" name="searchInput" placeholder="Search users" aria-label="Search">
            <button class="btn btn-custom" type="submit" name="searchBtn">Search</button>
        </form>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Years of Experience</th>
                    <th scope="col">Certifications</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!isset($_GET['searchBtn'])) { ?>
                    <?php $getAllUsers = getAllUsers($pdo); ?>
                    <?php foreach ($getAllUsers as $row) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Full_Name']); ?></td>
                            <td><?php echo htmlspecialchars($row['Email']); ?></td>
                            <td><?php echo htmlspecialchars($row['Phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['Specialization']); ?></td>
                            <td><?php echo htmlspecialchars($row['Years_of_Experience']); ?></td>
                            <td><?php echo htmlspecialchars($row['Certifications']); ?></td>
                            <td>
                                <a class="btn btn-sm btn-custom" href="edit.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a>
                                <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo htmlspecialchars($row['id']); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <?php $searchForAUser = searchForAUser($pdo, $_GET['searchInput']); ?>
                    <?php foreach ($searchForAUser as $row) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Full_Name']); ?></td>
                            <td><?php echo htmlspecialchars($row['Email']); ?></td>
                            <td><?php echo htmlspecialchars($row['Phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['Specialization']); ?></td>
                            <td><?php echo htmlspecialchars($row['Years_of_Experience']); ?></td>
                            <td><?php echo htmlspecialchars($row['Certifications']); ?></td>
                            <td>
                                <a class="btn btn-sm btn-custom" href="edit.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a>
                                <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo htmlspecialchars($row['id']); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
