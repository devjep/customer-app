<?php
    session_start();
	include "main.php";
 
    $target_dir = "assests/img/upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $image=1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    echo $_FILES["fileToUpload"]["name"];
    
    if($_FILES["fileToUpload"]["name"] == ''){
        $image=0;
       
    }
    else{
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header("Location: update.php");
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        $uploadOk = 0;
        }
    }


    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if ($image == 0)
        {
            try {
                $stmt = $connection->prepare ("
                         UPDATE customer 
                            SET firstname = :firstname, lastname  = :lastname, email = :email,
                            city = :city, country  = :country
        
                        WHERE id = :id
                    ");
                $stmt->bindParam(':id' ,  $_REQUEST['id'] );
                $stmt->bindParam(':firstname' ,  $_REQUEST['firstname']);
                $stmt->bindParam(':lastname' ,  $_REQUEST['lastname']);
                $stmt->bindParam(':email' ,  $_REQUEST['email'] );
                $stmt->bindParam(':city' ,  $_REQUEST['city'] );
                $stmt->bindParam(':country' , $_REQUEST['country']);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $stmt = null;
            header("Location: index.php");
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Updated Successfully.';
        }

        else{
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            
                try {
                    $stmt = $connection->prepare ("
                             UPDATE customer 
                                SET firstname = :firstname, lastname  = :lastname, email = :email,
                                city = :city, country  = :country, image  = :image
            
                            WHERE id = :id
                        ");
                    $stmt->bindParam(':id' ,  $_REQUEST['id'] );
                    $stmt->bindParam(':firstname' ,  $_REQUEST['firstname']);
                    $stmt->bindParam(':lastname' ,  $_REQUEST['lastname']);
                    $stmt->bindParam(':email' ,  $_REQUEST['email'] );
                    $stmt->bindParam(':city' ,  $_REQUEST['city'] );
                    $stmt->bindParam(':country' , $_REQUEST['country']);
                    $stmt->bindParam(':image' , $_FILES["fileToUpload"]["name"]);
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $stmt = null;
               
                 header("Location: index.php");
                 $_SESSION['status'] = 'success';
                 $_SESSION['message'] = 'Updated Successfully.';
          
            } else {
                header("Location: update.php");
                $_SESSION['status'] = 'error';
                $_SESSION['message'] = 'Sorry, there was an error uploading your file.';
            }
        }

        
    }


?>