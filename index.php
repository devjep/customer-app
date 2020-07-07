<?php 
    include 'main.php';
    include("libs/include/template/header.php");
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
                <a  class="btn btn-sm btn-danger" href="delete.php?id='.$value['id'].'">Delete</a>
                </td>
            </tr>    
            ';
        }   
?>

<div class="container-fluid p-3">
    <div class="row">
        <div class="col-md-4">
            <div id="calculator">
                <center>
                <div id="result"></div>
                <span class="key">7</span>
                <span class="key">8</span>
                <span class="key">9</span>
                <span class="key clear-key">C</span>
                <span class="key">4</span>
                <span class="key">5</span>
                <span class="key">6</span>
                <span class="key">/</span>
                <span class="key">1</span>
                <span class="key">2</span>
                <span class="key">3</span>
                <span class="key">*</span>
                <span class="key">0</span>
                <span class="key">00</span>
                <span class="key">.</span>
                <span class="key">+</span>
                <span class="key equal-key">=</span>
                <span class="key">-</span>
                </center>
            </div>  
           
        </div>

        <div class="col-md-8 ">
            <div class="card">
                <div class="card-body">
                <?php include("libs/include/message.php");?>
                    <div class="p-2">
                        <a href="register.php" class="btn btn-primary " width="30;">Add New Customer</a>
                    </div>
                    <br>

                    <table id="customerTable"  class="table table-responsive table-bordered" style="width:100%">
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

<?php include("libs/include/template/footer.php")?>
