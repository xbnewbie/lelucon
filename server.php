<?php
/**
 * Created by PhpStorm.
 * User: My Computer
 * Date: 11/22/2017
 * Time: 11:02 AM
 */

$cmd = $_GET['cmd'];
if($cmd =="ask_jawab"){
    $jawab="00x00";
    echo $jawab;
}else{
    $tanya = $_POST['tanya'];
    echo $tanya;
}
