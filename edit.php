<?php 
    include 'main.php';
    include("include/template/header.php");
    $stmt = $connection->prepare("SELECT * FROM customer WHERE id={$_REQUEST['id']} "); 
    $stmt->execute(); 
    $row = $stmt->fetch();
    
    
   
?>
<div class="container m-auto border p-lg-2">
    <h1>Customer Edit</h1>
    <?php include("include/message.php");?>
    <form action="update.php" method="Post" enctype="multipart/form-data">
        <input type="type" hidden name="id" value="<?=$row['id']?>">
        <input type="type" hidden name="tempImage" value="<?=$row['image']?>">
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">Firstname</span>
          </div>
          <input type="text" class="form-control"  name="firstname" id="firstname" value="<?=$row['firstname']?>">
        </div>
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">Lastname</span>
          </div>
          <input type="text" class="form-control"  name="lastname" id="lastname" value="<?=$row['lastname']?>">
        </div>
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">Email</span>
          </div>
          <input type="email" class="form-control" name="email" id="email" value="<?=$row['email']?>">
        </div>
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">City</span>
          </div>
          <input type="text" class="form-control" name="city" id="city" value="<?=$row['city']?>">
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text">Country</span>
           </div>
           <select class="form-control" name="country" id="country">
                <option hidden value=<?=$row['country']?>><?=$row['country']?></option>
               <option value="United States">United States</option>
               <option value="Canada">Canada</option>
               <option value="Japan">Japan</option>
               <option value="United Kingdom">United Kingdom</option>
               <option value="France">France</option>
               <option value="Germany">Germany</option>
           </select>
         </div>
         <label for="fileToUpload">Image</label>
         <div>
           <input type="file" name="fileToUpload" id="fileToUpload" onchange="loadFile(event)" value="<?=$row['image']?>" accept="image/*" >
         </div>
         <div>
              <img id="output" width="100"/>
          </div> 
         <div >
            <input type="submit" class="btn btn-success  mt-2 btn-block" value="Update">
        </div>
       
    </form>
</div>


<?php include("include/template/footer.php")?>
