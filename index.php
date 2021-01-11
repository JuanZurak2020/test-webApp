<?php 
require 'classes/Base.class.php';
require 'partials/cuerpohtml1.php';
require 'partials/header.php';

$base = new Base;
$base->indexLocation();
?>

<div class="container">
    <div class="row"> 
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h5 class="text-center">Please, select wich one option desire</h5>
            <br>
            <a href="login.php" class="btn btn-outline-primary btn-block">LOGIN</a>
            <br>
            <a href="singin.php" class="btn btn-outline-info btn-block">SING IN</a>
        </div>
        <div class="col-md-2"></div>    
    </div>
</div>

<?php 
require 'partials/cuerpohtml2.php';
?>
