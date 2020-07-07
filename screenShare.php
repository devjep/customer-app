<?php
    include 'main.php';
    include("libs/include/template/header.php");
?>

<div class="container">

    <p><button class="btn btn-success" id="start">Start Capture</button>&nbsp;<button class="btn btn-danger"  id="stop">Stop Capture</button></p>

    <video id="video" autoplay></video>
    <br>

    <strong>Log:</strong>
    <br>
    <pre id="log"></pre>
</div>


<?php include("libs/include/template/footer.php")?>


