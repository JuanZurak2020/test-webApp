<?php
require 'classes/Base.class.php';
require 'partials/cuerpohtml1.php';
require 'partials/header.php';
$base = new Base;
$base->singinLocation();

    if(!empty($_POST['name']) && !empty($_POST['password'])){
        $data = $base->singinMessages( $_POST['name'], $_POST['password'] );

    }
       
?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 sections">
        <?php if( isset( $data['message'] ) ){ ?>
        
        <div class="alert alert-<?php echo $data['color'] ?>" role="alert">
            <?php echo $data['message']; ?>

        </div>
        <?php } ?>


        <h3 class="text-center">ENTER THE DATA TO SING IN</h3>
        <hr>
        <form action="singin.php" id="form-singin" method="POST">
            <div class="form-group">
                <label for="name">NAME</label>
                <input type="text" placeholder="Name" class="text-center" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="password">PASSWORD</label>
                <input type="password" class="text-center" name="password" id="password" placeholder="********">
            </div>
            <div class="btn btn-block btn-outline-success" onClick="sendForm('form-singin')">SING IN</div>
            <a href="/test-web-d" class="btn btn-outline-secondary btn-block">BACK to MENU</a>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>


<script src="assets/js/script.js"></script>

<?php
    require 'partials/cuerpohtml2.php';
?>