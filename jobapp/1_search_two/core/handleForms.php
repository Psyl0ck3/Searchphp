<?php  

require_once 'dbConfig.php';
require_once 'models.php';


if (isset($_POST['insertUserBtn'])) {
	$insertUser = insertNewUser($pdo,$_POST['Full_Name'], $_POST['Email'], $_POST['Phone'], $_POST['Specialization'], $_POST['Years_of_Experience'], $_POST['Certifications']);

	if ($insertUser) {
		$_SESSION['message'] = "Successfully inserted!";
		header("Location: ../index.php");
	}
}


if (isset($_POST['editUserBtn'])) {
	$editUser = editUser($pdo,$_POST['Full_Name'], $_POST['Email'], $_POST['Phone'], $_POST['Specialization'], $_POST['Years_of_Experience'], $_POST['Certifications'], $_GET['id']);

	if ($editUser) {
		$_SESSION['message'] = "Successfully edited!";
		header("Location: ../index.php");
	}
}

if (isset($_POST['deleteUserBtn'])) {
	$deleteUser = deleteUser($pdo,$_GET['id']);

	if ($deleteUser) {
		$_SESSION['message'] = "Successfully deleted!";
		header("Location: ../index.php");
	}
}

if (isset($_GET['searchBtn'])) {
	$searchForAUser = searchForAUser($pdo, $_GET['searchInput']);
	foreach ($searchForAUser as $row) {
		echo "<tr> 
				<td>{$row['Full_Name']}</td>
				<td>{$row['Email']}</td>
				<td>{$row['Phone']}</td>
				<td>{$row['Specialization']}</td>
				<td>{$row['Years_of_Experience']}</td>
				<td>{$row['Certifications']}</td>
			  </tr>";
	}
}

?>