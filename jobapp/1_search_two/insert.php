<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit User</title>
	<!-- Bootstrap 5 CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for a cybersecurity aesthetic -->
	<link rel="stylesheet" href="styles.css">
	<style>
		/* Custom CSS to add a dark theme and cybersecurity vibes */
		body {
			background-color: #121212;
			color: #ffffff;
		}
		.container {
			max-width: 600px;
			margin-top: 50px;
			background-color: #1e1e1e;
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
		}
		.form-label {
			color: #ffff; /* Neon greenish color */
		}
		.form-control {
			background-color: #333;
			color: #fff;
			border: 1px solid #ffff;
		}
		.btn-custom {
			background-color: #0f3460;
			color: #ffff;
			font-weight: bold;
			border: none;
		}
		.btn-custom:hover {
			background-color: #0c5abb;
			color: black;
		}
		h1 {
			color: #fff;
			text-align: center;
			margin-bottom: 30px;
		}

		.form-control:focus {
			border-color: #00b39e;
			box-shadow: 0 0 5px rgba(0, 179, 158, 0.5);
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
		<h1>Edit User</h1>
		<form action="core/handleForms.php" method="POST">
			<div class="mb-3">
				<label for="Full_Name" class="form-label">Full Name</label>
				<input type="text" class="form-control" name="Full_Name" required>
			</div>
			<div class="mb-3">
				<label for="Email" class="form-label">Email</label>
				<input type="email" class="form-control" name="Email" required>
			</div>
			<div class="mb-3">
				<label for="Phone" class="form-label">Phone</label>
				<input type="text" class="form-control" name="Phone" required>
			</div>
			<div class="mb-3">
				<label for="Specialization" class="form-label">Specialization</label>
				<input type="text" class="form-control" name="Specialization" required>
			</div>
			<div class="mb-3">
				<label for="Years_of_Experience" class="form-label">Years of Experience</label>
				<input type="number" class="form-control" name="Years_of_Experience" required>
			</div>
			<div class="mb-3">
				<label for="Certifications" class="form-label">Certifications</label>
				<input type="text" class="form-control" name="Certifications" required>
			</div>
			<button type="submit" name="insertUserBtn" class="btn btn-custom w-100">Save Changes</button>
		</form>
	</div>
</body>
</html>
