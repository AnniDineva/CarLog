<?php
namespace Controllers;

use Main\_controller;

class mechanics extends _controller {


    function list(){
        //include(TEMPLATES_FOLDER . 'mechanics/list.php');

        $results = $this->mysql->query('SELECT id, name, phone, description FROM mechanics ORDER BY name');

        $this->loadTemplate('mechanics/list.php', ['results' => $results]);
    }

    function getOne(){
        $mechanicID = $_GET['id'];

        $results = $this->mysql_query('SELECT id, name, phone, description FROM mechanics WHERE id = "' . $mechanicID . '"');

        $returnData = [];
        if ($results->num_rows > 0){
            $returnData = $results->fetch_assoc();
        }

        echo json_encode($returnData);
    }

    function add(){
        $name =$_POST['name'];
        $phone = $_POST['phone'];
        $description = $_POST['description'];
        $sql=$this->mysql->query("INSERT INTO mechanics ( name, phone, description ) values ('$name','$phone', '$description')");
        $return = ($sql) ? 'success' : 'error';
        echo json_encode(['status' => $return]);


    }

    function store(){

    }

     function edit(){
        $name = $_POST['name'];
        $phone=$_POST['phone'];
        $description=$_POST['description'];
        $id=$_POST['id'];

        $update = $this->mysql->query("UPDATE mechanics SET name = '$name', phone = '$phone', description = '$description' WHERE id ='$id' ");
        $return = ($update) ? 'success' : 'error';
        echo json_encode(['status' => $return]);

     }
     function remove(){
         $id=$_GET['id'];
         $remove=$this->mysql->query("DELETE FROM mechanics WHERE id='$id'");
         $return = ($remove) ? 'success' : 'error';
         echo json_encode(['status' => $return]);
     }
}
?>
