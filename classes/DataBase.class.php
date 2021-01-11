<?php
class DataBase {
    // Properties
    public $server;
    public $username;
    public $password;
    public $schema;
    public $conn;

    public function __construct(){
        
    }

    public function conect(){
        try {
        //all the sentences PDO are from php native
            return new PDO( "mysql:host=$this->server;dbname=$this->schema", $this->username, $this->password );

        } catch (PDOExeption $e) {

            die('Conection failed ' . $e->getMessage() );
        }
    }

    public function insert($field, $value){
        $select = $this->select('users','name','name="'.$value.'"');
        if($select)
            return 2;
        $password = password_hash('12345678',PASSWORD_BCRYPT); // encrypts the password
        $query = 'INSERT INTO users ( '.$field.', password ) VALUES ("'.$value.'","'.$password.'")';
        $stmt = $this->conn->prepare($query);// prepare query PDO

        if( $stmt->execute() ){// execute query PDO
            $status = true;
        }else{
            $status = false;
        }

        return $status;

    }

    public function select($table, $fields, $where = '' ){
        
        $where = ($where === '') ? '':' WHERE '.$where.";"; 
        $query = 'SELECT '.$fields.' FROM '.$table.$where;
        $records = $this->conn->prepare($query); // prepare query PDO
        $records->execute(); // execute query PDO
        $r = $records->fetch(PDO::FETCH_ASSOC);
        
        return $r;

    }

    public function update($table, $field, $value, $where = ''){
        if($field == 'password')
            $value = '"'.password_hash($value,PASSWORD_BCRYPT).'"'; // encrypts the password
        $where = ($where === '') ? '':' WHERE '.$where.";"; 
        $query = 'UPDATE '.$table;
        $query .= ' SET '.$field .' = ' .$value .', password_update = 1';
        $query .= $where;

        $stmt = $this->conn->prepare($query);// prepare query PDO

        if( $stmt->execute() ){// execute query PDO
            $status = true;
        }else{
            $status = false;
        }

        return $status;
    }

}