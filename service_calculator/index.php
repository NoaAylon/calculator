<?php

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == "PUT"){
        parse_str(file_get_contents("php://input"),$_PUT);
        $func = $_PUT['func'];
    }
    
    if(isset($_GET['num1'])) // receive data via GET
        $num1 = (int)$_GET["num1"]; // convert String to Integer
    else if(isset($_POST['num1'])) // receive data via POST
        $num1 = (int)$_POST["num1"]; // convert String to Integer
    else if(isset($_PUT['num1'])) // receive data via PUT
        $num1 = (int)$_PUT["num1"]; // convert String to Integer
    else $num1 = 0; // if not set=>default will be 50. BTW, if not set, it will be 0.

    if(isset($_GET['num2'])) $num2 = (int)$_GET["num2"];
    else if(isset($_POST['num2'])) $num2 = (int)$_POST["num2"];
    else if(isset($_PUT['num2'])) $num2 = (int)$_PUT["num2"];
    else $num2 = 0;

    if(isset($_GET['num3'])) $num3 = (int)$_GET["num3"];
    else if(isset($_POST['num3'])) $num3 = (int)$_POST["num3"];
    else if(isset($_PUT['num3'])) $num3 = (int)$_PUT["num3"];
    else $num3 = 0;

    if(isset($_GET['func'])) $func = $_GET['func'];
    else if (isset($_POST['func'])) $func = $_POST['func'];
    else $func = $_PUT['func'];

   

    $calculator = new Calc();

    if($func == 'sum'){
       $res = $calculator->sum($num1,$num2,$num3);
    }else if($func == 'mult'){
      $res = $calculator->mult($num1,$num2,$num3);
    }else if($func == 'avg'){
       $res = $calculator->avg($num1,$num2,$num3);
    }else{
        header("HTTP/1.1 404 Not Found");
        return print('Error');
    }

    $a = array('result'=>$res); // build the results Array

    header('Content-Type: application/json'); // set header for json response
    echo json_encode($a); // echo the converted JSON Object from the Array
    return;

    class Calc{
        
        public function _construct(){
            print ('constructor called');
         }

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

?>


