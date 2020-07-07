<?php
	session_start();
    include "main.php";
    try {
		$stmt = $connection->prepare ("
				 DELETE FROM customer 
                WHERE id = :id
			");
		$stmt->bindParam(':id' ,  $_GET['id'] );
		$stmt->execute();
		header("Location: index.php");
		$_SESSION['status'] = 'error';
		$_SESSION['message'] = 'Deleted Succesfully.';
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$stmt = null;

?>