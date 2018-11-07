<?php


    if(isset($_GET['num1'])) // receive data via GET
        $num1 = (int)$_GET["num1"]; // convert String to Integer
    else if(isset($_POST['num1'])) // receive data via POST
        $num1 = (int)$_POST["num1"]; // convert String to Integer
    else if(isset($_PUT['num1'])) // receive data via PUT
        $num1 = (int)$_PUT["num1"]; // convert String to Integer
    else $num1 = 50; // if not set=>default will be 50. BTW, if not set, it will be 0.


    if(isset($_GET['num2'])) $num2 = (int)$_GET["num2"];
    else if(isset($_POST['num2'])) $num2 = (int)$_POST["num2"];
    else if(isset($_PUT['num2'])) $num2 = (int)$_PUT["num2"];
    else $num2 = 50;

    if(isset($_GET['num3'])) $num3 = (int)$_GET["num3"];
    else if(isset($_POST['num3'])) $num3 = (int)$_POST["num3"];
    else if(isset($_PUT['num3'])) $num3 = (int)$_PUT["num3"];
    else $num3 = 50;

    
    $func = $_GET['func'];

    class Calc{

        public function _destruct(){
           print ('destructor called');
        }
    
        public function mult($x, $y, $z){   
            return $x*$y*$z;
        }
    
        public function sum($x,$y,$z){
            return $x+$y+$z;
        }
    
        public function avg($x,$y,$z){
            return ($x+$y+$z)/3 ;
        }
    }

    $calculator = new Calc();

    if($func == 'sum'){
       $res = $calculator->sum($num1,$num2,$num3);
    }else if($func == 'mult'){
      $res = $calculator->mult($num1,$num2,$num3);
    }else if($func == 'avg'){
       $res = $calculator->avg($num1,$num2,$um3);
    }else{
        return print('Error');
    }

    $a = array('result'=>$res); // build the results Array

    header('Content-Type: application/json'); // set header for json response
    echo json_encode($a); // echo the converted JSON Object from the Array
?>


