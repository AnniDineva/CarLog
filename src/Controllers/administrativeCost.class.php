<?php
/*class administrativeCost {
    function listOfCost(){
        echo "Ivo";
    }
    function add(){

    }

}*/
namespace Controllers;

use Main\_controller;
class administrativeCost extends _controller{

    function listOfCost(){

    $results = $this->mysql_query('SELECT id, costName FROM costs ORDER BY costName');

    $this->loadTemplate('administrativeCost/listOfCost.php', ['results' => $results]);

    }
    function add(){
        $costName =$_POST['name'];
        $sql=$this->mysql_query("INSERT INTO costs ( costName ) values ('$costName')");
        $return = ($sql) ? 'success' : 'error';
        echo json_encode(['status' => $return]);
        /*$Cars=$this->mysql->query("SELECT name FROM cars");
        $returnDataCars=[];
        if ($Cars->num_rows > 0) {
            $returnDataCars=$Cars->fetch_assoc();
        }
        echo json_encode($returnDataCars);*/


    }
    function getOne(){
        $costID = $_GET['id'];

        $results = $this->mysql_query('SELECT id, costName  FROM costs WHERE id = "' . $costID . '"');

        $returnData = [];
        if ($results->num_rows > 0){
            $returnData = $results->fetch_assoc();
        }

        echo json_encode($returnData);
    }

    function edit(){
       $costName=$_POST['costName'];
       $id=$_POST['id'];

       $update = $this->mysql_query("UPDATE costs SET costName = '$costName' WHERE id ='$id' ");
       $return = ($update) ? 'success' : 'error';
       echo json_encode(['status' => $return]);

    }
    function remove(){
        $id=$_GET['id'];
        $remove=$this->mysql_query("DELETE FROM costs WHERE id='$id'");
        $return = ($remove) ? 'success' : 'error';
        echo json_encode(['status' => $return]);
    }

    function viewCostOfCar($carId){
        $results = $this->mysql_query('SELECT id, carId, nextPayment, price, costID, dateOfPayment FROM costOfCars  WHERE carId = "' . $carId . '"');
        $resultsCost=$this->mysql_query('SELECT id, costName FROM costs ');

        $this->loadTemplate('administrativeCost/carsAdminCost.php', ['results' => $results, 'carId'=>$carId, 'resultsCost'=>$resultsCost]);

    }

    function addCarsCost($carId){
        $nextPayment=$_POST['nextPayment'];
        $price=$_POST['price'];
        $costID=$_POST['costID'];

        $sql=$this->mysql_query("INSERT INTO costOfCars (carId, nextPayment, price, costID) values ('$carId', '$nextPayment', '$price', '$costID')");
        $return=($sql)? 'success':'error';
        echo json_encode(['status'=>$return]);


    }

    function getOneCostOfCar(){
        $costID = $_GET['id'];

        $results = $this->mysql_query('SELECT id, costID, nextPayment, price, carID, dateOfPayment  FROM costOfCars WHERE id = "' . $costID . '"');

        $returnData = [];
        if ($results->num_rows > 0){
            $returnData = $results->fetch_assoc();
        }

        echo json_encode($returnData);
    }

    function removeCostOfCar($carId){
        $id=$_GET['id'];;
        $remove=$this->mysql_query("DELETE FROM costOfCars WHERE id='$id'");
        $return=($remove)? 'success' : 'error';
        echo json_encode (['status'=>$return]);
    }

    function editCostCar($carId){
        $nextPayment=$_POST['nextPayment'];
        $price=$_POST['price'];
        $id=$_POST['id'];
        $update=$this->mysql_query("UPDATE costOfCars SET nextPayment='$nextPayment', price='$price' WHERE id='$id'");
        $return=($update) ? 'success' : 'error';
        echo json_encode(['status'=>$return]);

    }

    function payCost(){
        $id=$_POST['id'];
        $update=$this->mysql_query("UPDATE costOfCars SET dateOfPayment=NOW() WHERE id='$id'");
        $return=($update) ? 'success': 'error';
        echo json_encode(['status'=>$return]);
    }


}
?>
