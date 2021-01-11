<?php
require 'classes/DataBase.class.php';
class Base extends DataBase{

    public function __construct() {
        $this->server = '127.0.0.1';
        $this->username = 'root';
        $this->password = '';
        $this->schema = 'test';
        $this->conn = $this->conect();
        
        session_start(); // php native for sessions
    }

    function indexLocation(){
        if(isset($_SESSION['name'])){
            if($_SESSION['password_update'] == 0)
                return header('Location: ./passwordReset.php');
            elseif ($_SESSION['password_update'] == 1)
                return header('Location: ./app.php');
        }
    }

    function loginLocation(){
        if(!empty($_SESSION['name']))
            return header('Location: ./index.php');
           
    }

    function loginMessages($name){
        $name = htmlentities($name, ENT_QUOTES | ENT_IGNORE, "UTF-8");
        $res = $this->insert('name',$name);

        switch( (int)$res ){
            case 0:
                $message = "Successfully created new user ".$name." his default password is 12345678";
                $color_alert = "warning";
                break;
            case 1:
                $message = "Successfully created new user ".$name." his default password is 12345678";
                $color_alert = "success";
                break;
            case 2:
                $message = $name." is in database, please, select other one";
                $color_alert = "warning";
                break;
        }
        return ['message' => $message, 'color' => $color_alert ];
    }

    function singinLocation(){
        if(!empty($_SESSION['name']))
            header('Location: ./index.php');
    }

    function singinMessages( $name, $password){
        $name = htmlentities( $name, ENT_QUOTES | ENT_IGNORE, "UTF-8" );
        $res = $this->select('users', 'name,password,password_update', 'name="'.$name.'"' );
        if(!$res)
            $op = 0;
        else
            $op = password_verify( $password,$res['password'] ) ? 1 : 0;

        switch( $op ){
            case 0:
                $message = "incorrect data entered";
                $color_alert = "danger";
                return ['message'=>$message, 'color'=>$color_alert];
                break;
            case 1:
                $_SESSION['name'] = $res['name'];
                $_SESSION['password_update'] = $res['password_update'];
                return header('Location: ./index.php');
                break;
        }
    }

    function pss_reset($password){

        $where = 'name="'.$_SESSION['name'].'"';
        $res = $this->update('users', 'password', $password, $where);
        if(!$res)
            $op = 0;
        else
            $op = 1;

        switch( $op ){
            case 0:
                $message = "sorry, something went wrong in your process";
                $color_alert = "danger";
                break;
            case 1:

                $_SESSION['password_update'] = 1;
                return header('Location: ./index.php');
                break;
        }
        return [ 'message' => $message, 'color' => $color_alert];
        
    }
}

?>