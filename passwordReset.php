<?php
require 'classes/Base.class.php';
$base = new Base;

if(isset($_SESSION['name'])){
    if( $_SESSION['password_update'] == 1 )
    header('Location: ./app.php');
    elseif ( $_SESSION['password_update'] == 0 ){
        if(!empty($_POST['password'])){

            $data = $base->pss_reset($_POST['password']);

        }
        require 'partials/cuerpohtml1.php';
        require 'partials/header.php';
    ?>
        <div class="container">
            <div class="row"> 
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php if( isset($data['message']) ){ ?>
        
                        <div class="alert alert-<?php echo $data['color'] ?>" role="alert">
                            <?php echo $data['message']; ?>

                        </div>
                    <?php } ?>
                    <h3 class="text-center"> <?php echo $_SESSION['name'] ?></h3>
                    <br>
                    <h5 class="text-center">To continue, you must update your password</h5>
                    <br>
                    <form action="passwordReset.php" method="POST" id="form-update-p">
                        <div class="form-group">
                            <label for="password">NEW PASSWORD</label>
                            <input type="password" class="text-center" name="password" id="password" placeholder="********">
                        </div>
                        <div class="btn btn-outline-primary btn-block" onClick="sendForm('form-update-p')">SUBMIT</div>
                    </form>
                </div>
                <div class="col-md-2"></div>    
            </div>
        </div>
        <script src="assets/js/script.js"></script>
    <?php
        require 'partials/cuerpohtml2.php';
    }else{
        header('Location: ./index.php');
    }
}else{
    header('Location: ./index.php');
}
?>