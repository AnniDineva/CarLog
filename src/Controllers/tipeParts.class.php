<?php
namespace Controllers;

use Main\_controller;

class tipeParts extends _controller {

    function listTipeParts(){

        /*$test = [
            'ivo' => 30,
            'ani' => 29,
            'alex' => 6
        ];

        foreach ($test as $key => $value) {
            echo "$key is $value age old \n";
        }
        die();*/

        //$results=$this->mysql_query('SELECT id, parentID, namePart FROM tipeParts ORDER BY namePart ');
        $results = $this->getPartsRecurse(0);
        /*
        echo "<pre>";
        var_dump($results);
        echo "</pre>";
        die();
        */

        $this->loadTemplate('parts/tipeParts.php', ['results'=>$results,]);



    }  //End listTipeParts function

    function add(){
        $namePart=$_POST['namePart'];
        $parentID=$_POST['parentID'];
        $sql=$this->mysql_query("INSERT INTO tipeParts (namePart, parentID) values('$namePart', '$parentID')");
        $return=($sql)? 'success' : 'error';
        echo json_encode (['status'=>$return]);
    }  //End add function

    function getPartsRecurse($parentID, $deep = 0){

        $categories = [];

        // $results = SELECT .... WHERE parent_id = '$parentID'
        $results=$this->mysql_query('SELECT id, parentID, namePart FROM tipeParts WHERE parentID = '.$parentID.'  ORDER BY namePart');

        if ($results->num_rows){
            while($row = $results->fetch_assoc()){

                $row['deep'] = $deep;
                $row['space'] = '';
                for ($i = 0; $i < $deep; $i++){
                    $row['space'] .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                }

                array_push($categories, $row);

                $childs = $this->getPartsRecurse($row['id'], $deep+1);
                if (count($childs)){
                    $categories = array_merge($categories, $childs);
                }
            }
        }


        return $categories;
    }

    function getOne(){
        $id=$_GET['id'];
        $results=$this->mysql_query('SELECT  id, parentID, namePart FROM tipeParts WHERE id="'. $id . '"');

        $returnData=[];
        if ($results->num_rows >0){
            $returnData=$results->fetch_assoc();
        }

        echo json_encode($returnData);
    }

    function edit(){
        $namePart=$_POST['namePart'];
        $parent=$_POST['parentID'];
        $id=$_POST['id'];

        $update=$this->mysql_query("UPDATE tipeParts SET parentID='$parent', namePart='$namePart' WHERE id='$id'");
        $return=($update) ? 'success' : 'error';
        echo json_encode (['status'=>$return]);
    }

        function recurseRemove($id){
            //$id=$_GET['id'];
            $parentID=$this->mysql_query("SELECT id, parentID FROM tipeParts ");
            if ($parentID->num_rows > 0) {
                $resultsParents=[];
                while($row = $parentID->fetch_assoc()){

                    if ( $key=( array_search($id, $row))){

                        array_push($resultsParents, $row['id']);
                        //die('Stop');
                    }else {

                    }

                }
                print_r($resultsParents);
                return $resultsParents;
                }
        }

        function remove(){
            $id=$_GET['id'];
            $parentID=$this->mysql_query("SELECT id, parentID FROM tipeParts ");
            $this->recurseRemove($id);


            //$remove=$this->mysql_query("DELETE FROM tipeParts WHERE id='$id' or parentID='$id'");
            //$return = ($remove) ? 'success' : 'error';
            //echo json_encode(['status' => $return]);
        }


        //Functions only for Parts
        function listParts(){
            $results = $this->getPartsRecurse(0);

            $resultsParts=$this->mysql_query('SELECT parts.id, categoriesID, nameOfPart, tipeParts.namePart AS categoryName
                FROM parts
                LEFT JOIN tipeParts ON tipeParts.id = parts.categoriesID
                ORDER by nameOfPart');

            $this->loadTemplate('parts/parts.php', ['results'=>$results, 'resultsParts'=>$resultsParts]);
        }

        function addPart(){
            $nameOfPart=$_POST['nameOfPart'];
            $categoriesID=$_POST['categoriesID'];
            $sql=$this->mysql_query("INSERT INTO parts (categoriesID, nameOfPart) values ('$categoriesID', '$nameOfPart')");
            $return=($sql)? 'success' : 'error';
            echo json_encode (['status'=>$return]);
        }

        function getOneEditPart(){
            $id=$_GET['id'];
            $results=$this->mysql_query('SELECT id, categoriesID, nameOfPart FROM parts WHERE id="'.$id .'"');

            $returnData=[];
            if ($results->num_rows >0){
                $returnData=$results->fetch_assoc();
            }

            echo json_encode($returnData);
        }

        function editPart(){
            $nameOfPart=$_POST['nameOfPart'];
            $categoryId=$_POST['categoryId'];
            $id=$_POST['id'];

            $update=$this->mysql_query("UPDATE parts
                SET nameOfPart= '$nameOfPart', categoriesID= '$categoryId'
                WHERE id= '$id' ");
            $return=($update) ? 'success' : 'error'    ;
            echo json_encode (['status'=>$return]);
        }

        function removePart(){
            $id=$_GET['id'];
            $remove=$this->mysql_query("DELETE FROM parts WHERE id='$id' ");
            $return= ($remove) ? 'success' : 'error';
            echo json_encode(['status' => $return]);
        }


}//End class tipeParts
?>
