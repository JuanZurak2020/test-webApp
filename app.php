<?php 
require 'classes/Base.class.php';
$base = new Base;
if(isset($_SESSION['name'])){


    if($_SESSION['password_update'] == 0)
        header('Location: ./passwordReset.php');
    elseif ($_SESSION['password_update'] == 1){
        require 'partials/cuerpohtml1.php';
        require 'partials/header.php';
    ?>
        <div class="container">
            <div class="row"> 
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h3 class="text-center">WELCOME <?php echo $_SESSION['name'] ?></h3>
                    <br>
                    <h5 class="text-center">YOU ARE LOGGED IN</h5>

                    <a class="btn btn-block btn-outline-secondary" href="logout.php">LOGOUT</a>
                </div>
                <div class="col-md-2"></div>    
            </div>
        </div>
    <?php
        require 'partials/cuerpohtml2.php';
    }else{
        header('Location: ./index.php');
    }
}else{
    header('Location: ./index.php');
}
?>
