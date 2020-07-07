<?php 
    include 'main.php';
    include("include/template/header.php");
		try {
	
		$stmt = $connection->query ("
				SELECT * FROM customer
			");
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
        $data='';
		foreach ($stmt as $key => $value) {
            $data .='
            <tr>
                <td>'.$value['id'].'</td>
                <td><img src="'.$basePath.'/assests/img/upload/'.$value['image'].'" width="50"></td>
                <td>'.$value['firstname'].'</td>
                <td>'.$value['lastname'].'</td>
                <td>'.$value['email'].'</td>
                <td>'.$value['city'].'</td>
                <td>'.$value['country'].'</td>
                <td><a  class="btn btn-sm btn-info" href="show.php?email='.$value['email'].'">Show</a>
                <a  class="btn btn-sm btn-success" href="edit.php?id='.$value['id'].'">Edit</a>
                <a  class="btn btn-sm btn-danger delete" href="delete.php?id='.$value['id'].'">Delete</a>
                </td>
            </tr>    
            ';
        }   
?>

<div class="container-fluid p-3">
    <div class="row">
        <div class="col-md-3">
            <iframe id="iframeInsert" src="calculator.html" frameborder="0" height="250"></iframe>
            <div id="calculator">
                <label for="result"style="color:white">Result</label><input id="result" class="form-control" type="text">
            </div>
        </div>
        <div class="col-md-9 ">
            <div class="card">
                <div class="card-body">
                <?php include("include/message.php");?>
                    <div class="p-2">
                        <a href="register.php" class="btn btn-primary " width="30;">Add New Customer</a>
                    </div>
                    <br>
                    <table id="customerTable"  class="table  table-bordered" style="width:100%">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Action's</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $data ?>
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div>
</div>

<?php include("include/template/footer.php")?>
