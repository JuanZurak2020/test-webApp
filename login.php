<?php
require 'classes/Base.class.php';
require 'partials/cuerpohtml1.php';
require 'partials/header.php';
$base = new Base;
$resp = $base->loginLocation();
if(!empty($_POST['name'])){
    $data = $base->loginMessages( $_POST['name'] );
}

    
?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 sections">
        <?php if( isset($data['message']) ){ ?>
        
        <div class="alert alert-<?php echo $data['color'] ?>" role="alert">
            <?php echo $data['message']; ?>

        </div>
        <?php } ?>


        <h3 class="text-center">ENTER THE DATA to LOGIN</h3>
        <hr>
        <form action="login.php" id="form-login" method="POST">
            <div class="form-group">
                <label for="name">NAME</label>
                <input type="text" placeholder="Name" class="text-center" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="name">DEFAULT PASSWORD</label>
                <input type="text" placeholder="12345678" class="text-center" disabled>
            </div>
            <div class="btn btn-block btn-outline-success" onClick="sendForm('form-login')">SAVE</div>
            <a href="./test-web-d/index.php" class="btn btn-outline-secondary btn-block">BACK to MENU</a>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>

<script src="assets/js/script.js"></script>

<?php
    require 'partials/cuerpohtml2.php';
?>