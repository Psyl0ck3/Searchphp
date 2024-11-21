<?php  

require_once 'dbConfig.php';

function getAllUsers($pdo) {
    $sql = "SELECT id, Full_Name, Email, Phone, Specialization, Years_of_Experience, Certifications
            FROM cybersecurity_specialists
            ORDER BY Full_Name ASC";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $users = $stmt->fetchAll();
        return $users;
    } else {
        print_r($stmt->errorInfo()); // Debugging aid
        return [];
    }
}


function getUserByID($pdo, $id) {
	$sql = "SELECT * from cybersecurity_specialists WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function searchForAUser($pdo, $searchQuery) {
    $sql = "SELECT id, Full_Name, Email, Phone, Specialization, Years_of_Experience, Certifications
            FROM cybersecurity_specialists 
            WHERE CONCAT(Full_Name, Email, Phone, Specialization, Years_of_Experience, Certifications) LIKE ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute(["%" . $searchQuery . "%"]);

    if ($executeQuery) {
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } else {
        
        print_r($stmt->errorInfo()); 
        return [];
    }
}




function insertNewUser($pdo, $Full_Name, $Email, $Phone,$Specialization,
$Years_of_Experience, $Certifications) {

	$sql = "INSERT INTO cybersecurity_specialists
			(
				Full_Name,
                Email,
                Phone,
                Specialization,
				Years_of_Experience,
                Certifications
			)
			VALUES (?,?,?,?,?,?)
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([
		$Full_Name, $Email, $Phone,$Specialization,
        $Years_of_Experience, $Certifications
	]);

	if ($executeQuery) {
		return true;
	}

}

function editUser($pdo, $Full_Name, $Email, $Phone, $Specialization, $Years_of_Experience, $Certifications, $id) {
    $sql = "UPDATE cybersecurity_specialists
            SET Full_Name = ?,
                Email = ?,
                Phone = ?,
                Specialization = ?,
                Years_of_Experience = ?,
                Certifications = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$Full_Name, $Email, $Phone, $Specialization, $Years_of_Experience, $Certifications, $id]);

    if ($executeQuery) {
        return true;
    }

    return false;  
}



function deleteUser($pdo, $id) {
	$sql = "DELETE FROM cybersecurity_specialists 
			WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return true;
	}
}


?>