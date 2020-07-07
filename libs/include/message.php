<?php session_start();
?>
<?php if (isset($_SESSION['status']) && $_SESSION['status'] == "success") : ?>
    <div class="alert alert-dismissible mt-2" style="background-color:#4CAF50;color:white;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Notification:</strong><?php echo $_SESSION['message']; ?>
    </div>

<?php $_SESSION['status']=''; $_SESSION['message']=''; endif ?>

<?php if (isset($_SESSION['status']) && $_SESSION['status'] == "error") : ?>
    <div class="alert alert-dismissible mt-2" style="background-color:#e60000;color:white;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Notification:</strong><?php echo $_SESSION['message']; ?>
    </div>
<?php  $_SESSION['status']=''; $_SESSION['message']=''; endif ?>


