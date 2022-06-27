<?php
namespace Controllers;

use Main\_controller;

class cars extends _controller {


    function listOfCars(){
        $results = $this->mysql_query('SELECT id, name, mark, model, number, year, img FROM cars ORDER BY name');

        $this->loadTemplate('cars/listOfCars.php', ['results' => $results]);
    }

    function add(){
        $name=$_POST['name'];
        $mark=$_POST['mark'];
        $model=$_POST['model'];
        $number=$_POST['number'];
        $year=$_POST['year'];
        $img=$_POST['img'];
        $sql=$this->mysql_query("INSERT INTO cars (name, mark, model, number, year, img) values('$name', '$mark', '$model', '$number','$year', '$img')");
        $return=($sql)? 'success' : 'error';
        echo json_encode(['status'=>$return]);
    }
    function overview($carId){

        $results = $this->mysql_query('SELECT id, name, mark, model, number, year, img FROM cars WHERE id="' .$carId. '"');

        $carDetails = $results->fetch_assoc();

        $probegResult=$this->mysql_query('SELECT date, probeg FROM probeg WHERE carId="' .$carId. '"');




        $this->loadTemplate('cars/carOverview.php', ['carDetails' => $carDetails, 'carId' => $carId, 'probegView' => $probegResult]);



    }

}
 ?>
