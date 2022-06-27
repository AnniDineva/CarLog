<?php
namespace Controllers;

use Main\_controller;

class probeg extends _controller{

    function ViewProbeg($carId){
        $probegResult=$this->mysql_query('SELECT id, carId, date, probeg FROM probeg WHERE carId="' .$carId. '"');
        $this->loadTemplate('cars/probeg.php', ['probegView'=>$probegResult, 'carId'=>$carId]);

    }




    function add($carId){
        //$carId=$this->mysql->query('SELECT id FROM cars');
        //$carDetails=$carId->fetch_assoc();
        //var_dump($carDetails);
        //die();

        $date=$_POST['date'];
        $probeg=$_POST['probeg'];
        //var_dump($carId);

        $sql=$this->mysql->query("INSERT INTO probeg (carId, date, probeg)values ('$carId', '$date', '$probeg')");
        $return=($sql)?'success':'error';
        echo json_encode(['status'=>$return]);

    }

    function getOneProbeg(){
        $id=$_GET['id'];
        $results=$this->mysql_query('SELECT id, carId, date, probeg FROM probeg WHERE id="'.$id .'"');

        $returnData=[];
        if ($results->num_rows >0){
            $returnData=$results->fetch_assoc();
        }

        echo json_encode($returnData);
    }

    function removeProbeg(){

    }


}
 ?>
