<?php
session_start();
include "main.php";

$stmt = $connection->prepare("SELECT * FROM customer WHERE email='{$_REQUEST['email']}' "); 
$stmt->execute(); 
$row = $stmt->fetch();
print_r($row);
if ($row != null){
	header("Location: register.php");
	$_SESSION['status'] = 'error';
	$_SESSION['message'] = 'Email already exists.';
	exit();
}




$target_dir = "assests/img/upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$image = 1;

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	header("Location: create.php");
	$_SESSION['status'] = 'error';
	$_SESSION['message'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
	$uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      
    try {
		$stmt = $connection->prepare ("
				INSERT INTO customer 
				(firstname, lastname, email, city, country, image)
				VALUES
				(:firstname , :lastname , :email, :city, :country, :image)
			");
		$stmt->bindParam(':firstname' ,  $_REQUEST['firstname']);
		$stmt->bindParam(':lastname' ,  $_REQUEST['lastname']);
		$stmt->bindParam(':email' ,  $_REQUEST['email'] );
		$stmt->bindParam(':city' ,  $_REQUEST['city'] );
		$stmt->bindParam(':country' , $_REQUEST['country']);
		$stmt->bindParam(':image' ,  $_FILES["fileToUpload"]["name"]);
		$stmt->execute();
	
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$stmt = null;
	
	header("Location: index.php");
	$_SESSION['status'] = 'success';
	$_SESSION['message'] = 'Registered Successfully.';
	

  } else {
	header("Location: create.php");
	$_SESSION['status'] = 'error';
	$_SESSION['message'] = 'Sorry, there was an error uploading your file.';
  }
}



?>

