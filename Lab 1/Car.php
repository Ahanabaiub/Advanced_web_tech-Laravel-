<?php

    class car{

        public $engineNo;
        public $model;
        public $owner;
    
        function __construct($engineNo,$model,$owner){
    
            $this->engineNo=$engineNo;
            $this->model=$model;
            $this->owner=$owner;
    
    
        }
    
        function showInfo(){
            echo "Engine No: ".$this->engineNo."<br>";
            echo "Model : ". $this->model."<br>";
            echo "Owner : ". $this->owner."<br>";
        }
    }


    $car1 = new car("12-22-3","Honda Accord","Karim");

    $car1->showInfo();

  

?>