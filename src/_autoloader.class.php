<?php
function my_autoloader($class){
    /*
    print_r($class);
    if (strstr($class, 'Main\\') && !strstr($class, '_')){
        return false;
    }
    Main\_templateSystem
    Main/_templateSystem
    */

        $filename = SRC_FOLDER . str_replace('\\', '/', $class) . '.class.php';
        include($filename);

}

spl_autoload_register('my_autoloader');


class _autoloader {
    private $rootPath = __DIR__.'/../';
    public $urlParameters = [];

    function __construct(){
        $this->loadConfigs();
        $this->reqiestURIExtract();
        $this->routes();
    }

    function loadConfigs(){
        include($this->rootPath . 'config/main.config.php');
        include($this->rootPath . 'config/db.config.php');
    }

    function routes(){
        if ($this->urlParameters[0] == 'mechanics'){
            //$this->loadController('mechanics');
            $mechanicsClass = new Controllers\mechanics();
            if (!isset($this->urlParameters[1])){
                $mechanicsClass->list();
            } else if ($this->urlParameters[1] == 'add'){
                $mechanicsClass->add();
            } else if ($this->urlParameters[1] == 'getOne'){
                $mechanicsClass->getOne();
            } else if ($this->urlParameters[1] == 'edit'){
                $mechanicsClass->edit();
            } else if ($this->urlParameters[1] == 'remove'){
                $mechanicsClass->remove();
            } else {
                //reutnr 404
            }
        } else if ($this->urlParameters[0]== 'administrativeCost') {
            //$admiministrativeCostClass=$this->loadClassFromSRC('administrativeCost');
            $admiministrativeCostClass = new Controllers\administrativeCost();
            if (!isset($this->urlParameters[1])) {
                $admiministrativeCostClass->listOfCost();
            } else if ($this->urlParameters[1]=='add') {
                $admiministrativeCostClass->add();

            }else if ($this->urlParameters[1]=='edit') {
                $admiministrativeCostClass->edit();
            }else if ($this->urlParameters[1]=='getOne') {
                $admiministrativeCostClass->getOne();
            }else if ($this->urlParameters[1]=='remove') {
                $admiministrativeCostClass->remove();
            }

            else {
                // return 404
            }
        }elseif ($this->urlParameters[0]=='cars') {
            $carsClass = new Controllers\cars();
            if (!isset($this->urlParameters[1])) {
                $carsClass->listOfCars();
            }elseif ($this->urlParameters[1]=='add') {
                $carsClass->add();
            }elseif (is_numeric($this->urlParameters[1])){

                if (!isset($this->urlParameters[2])){
                    $carsClass->overview($this->urlParameters[1]);
                } else if ($this->urlParameters[2]=='probeg'){
                    $probegClass=new Controllers\probeg();
                    if(!isset($this->urlParameters[3])){
                        $probegClass->ViewProbeg($this->urlParameters[1]);
                    }elseif ($this->urlParameters[3]=='add') {
                        $probegClass->add($this->urlParameters[1]);
                    }elseif ($this->urlParameters[3]=='getOneProbeg') {
                        $probegClass->getOneProbeg($this->urlParameters[1]);
                    }elseif ($this->urlParameters[3]=='removeProbeg') {
                        $probegClass->removeProbeg($this->urlParameters[1]);
                    }

                }else if ($this->urlParameters[2]=='adminCostCar') {
                    $admiministrativeCostClass = new Controllers\administrativeCost();
                    if(!isset($this->urlParameters[3])){
                        $admiministrativeCostClass->viewCostOfCar($this->urlParameters[1]);
                    }else if ($this->urlParameters[3]=='add') {
                        $admiministrativeCostClass->addCarsCost($this->urlParameters[1]);
                    }else if ($this->urlParameters[3]=='removeCostOfCar') {
                        $admiministrativeCostClass->removeCostOfCar($this->urlParameters[1]);
                    }else if ($this->urlParameters[3]=='getOneCostOfCar') {
                        $admiministrativeCostClass->getOneCostOfCar($this->urlParameters[1]);
                    }else if ($this->urlParameters[3]=='editCostCar') {
                        $admiministrativeCostClass->editCostCar($this->urlParameters[1]);
                    }else if ($this->urlParameters[3]=='payCost') {
                        $admiministrativeCostClass->payCost($this->urlParameters[1]);
                    }else {
                        // return 404
                    }

                }else {
                    //return 404
                }
            }

        }else if($this->urlParameters[0]=='parts'){
            $tipePartsClass=new Controllers\tipeParts();
            if (!isset($this->urlParameters[1])){
                $tipePartsClass->listTipeParts();
            } else if ($this->urlParameters[1] == 'add'){
                $tipePartsClass->add();
            } else if ($this->urlParameters[1] == 'getOne'){
                $tipePartsClass->getOne();
            }else if ($this->urlParameters[1] == 'edit'){
                $tipePartsClass->edit();
            }else if ($this->urlParameters[1] == 'remove'){
                $tipePartsClass->remove();
            }else if ($this->urlParameters[1] == 'listParts'){
                $tipePartsClass->listParts();
            }else if ($this->urlParameters[1] == 'addPart'){
                $tipePartsClass->addPart();
            }else if ($this->urlParameters[1] == 'getOneEditPart'){
                $tipePartsClass->getOneEditPart();
            }else if ($this->urlParameters[1] == 'editPart'){
                $tipePartsClass->editPart();
            }else if ($this->urlParameters[1] == 'removePart'){
                $tipePartsClass->removePart();
            }else {
                // return 404
            }
        }else {
            // RETURN 404
        }
    }


    function reqiestURIExtract(){


        $explodeURL = explode('?', $_SERVER['REQUEST_URI']);

        $explodeURL = explode('/', $explodeURL[0]);
        array_shift($explodeURL);

        $this->urlParameters = $explodeURL;

        //$allCategories = $this->getPartsRecurse(0);

    }

    /*function getPartsRecurse($parentID){

        $categories = [];

        // $results = SELECT .... WHERE parent_id = '$parentID'

        if ($results->num_row()){
            while($row = $results->fetch_assoc()){
                $childs = $this->getPartsRecurse($row['id']);
                if (count($childs)){
                    $row['childs'] = $childs;
                }
                array_push($categories, $row);
            }
        }


        return $categories;
    }*/

}
?>
