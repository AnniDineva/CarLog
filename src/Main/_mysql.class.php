<?php
namespace Main;

class _mysql {
    public $mysqlCon;

    __construct(){
        $this->mysqlCon = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

        if ($this->mysqlCon->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        return $this->mysqlCon;
    }
}
?>
