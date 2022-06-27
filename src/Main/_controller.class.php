<?php

namespace Main;

use Main\_templateSystem;
use Main\_mysql;

class _controller {
    public $mysql;

    function __construct(){
        $this->mysql = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

        if ($this->mysql->connect_error){
            die("Connection failed: " . $this->mysql->connect_error);
        }
    }

    public function mysql_query($mysqlQuery){
        if ($queryResult = $this->mysql->query($mysqlQuery)){
            return $queryResult;
        } else {
            die('Mysql Error: ' . $this->mysql->error);
        }
    }

    public function loadTemplate($template, $variables = []){
        $templateObject = new _templateSystem($template, $variables);
    }
}
?>
