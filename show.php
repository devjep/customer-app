<?php 
    session_start();
    include 'main.php';
    include("include/template/header.php");
    $stmt = $connection->prepare("SELECT * FROM customer WHERE email='{$_REQUEST['email']}' "); 
    $stmt->execute(); 
    $row = $stmt->fetch();
    if ($row == null){
        header("Location: index.php");
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = ' Record not Found';
        exit();
    }
    $path = $basePath.'/assests/img/upload/'.$row['image'];
  
?>
<div class="container m-auto">       
    <div class="card">
        <div class="card-header"><h5>Customer Profile<h5></div>
        <div class="card-body">
        
            <div class="row">
               
                <div class="col-md-4">
                    <div>
                        <img src="<?=$path?>" class="rounded-circle" width="200" height="200">
                    </div>
                </div>
                <div class="col-md-8">
                    
                    <label for=""><h3><strong><?=strtoupper($row['firstname']).' '.strtoupper($row['lastname'])?></strong></h3></label><br>  
                    <label for=""><strong>Email:</strong> <?=$row['email']?></label><br>
                    <label for=""><strong>City:</strong>  <?=$row['city']?></label> <br> 
                    <label for=""><strong>Coutnry:</strong> <?=$row['country']?></label> <br> 
                </div>
            </div>
        
        </div>
    </div>     
</div>
<?php include("include/template/footer.php")?>