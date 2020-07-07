<?php

 include("libs/include/template/header.php");
 $today=date('Y-m-d H:i');
?>



<div class="container border  p-3">
    <h1>Customer Registration</h1>
    <?php include("libs/include/message.php");?>
    <form  id="myForm" action="create.php" method="Post" enctype="multipart/form-data" >
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">Firstname</span>
          </div>
          <input type="text" class="form-control"  name="firstname" id="firstname" required>
        </div>
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">Lastname</span>
          </div>
          <input type="text" class="form-control"  name="lastname" id="lastname"  required>
        </div>
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">Email</span>
          </div>
          <input type="email" class="form-control" name="email" id="email"  required>
        </div>
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">City</span>
          </div>
          <input type="text" class="form-control" name="city" id="city"  required>
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text">Country</span>
            </div>
            <select class="form-control" name="country" id="country"  required>
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
          <input type="file" name="fileToUpload" id="fileToUpload" onchange="loadFile(event)" accept="image/*"  required>
          </div>
          <div>
              <img id="output" width="100"/>
          </div> 
          
          <div class="justify-content-between">
              <input type="submit" class="btn btn-primary  mt-2" value="Register">
              <button  class="btn btn-danger  mt-2" value="Reset"  onclick="reset()">Reset</button>
          </div>
    </form>

   
       
</div>

<?php include("libs/include/template/footer.php")?>