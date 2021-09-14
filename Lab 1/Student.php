<?php

    class student{

        public $name;
        public $id;
        public $dob;
        public $corses=array();

        function showInfo(){
            echo "Name : ".$this->name."<br>";
            echo "Id : ".$this->id."<br>";
            echo "Date of Birth : ".$this->dob."<br>";
        }

        function addcourse($courseName){
            $this->corses[]=$courseName;
        }

        function showAllcourses(){
            echo "Courses :";
            foreach($this->corses as $c){
                echo $c." ";
            }
        }
    }

    $student1 = new student();
    $student1->name="Rahim";
    $student1->id=1001;
    $student1->dob="10/11/1996";

    $student1->showInfo();

    $student1->addcourse("Physics");
    $student1->addcourse("Math");

    $student1->showAllcourses();

?>