<?php
$link2 = "http://localhost/jimmy/";
function redirect($val=""){
    $joinLink = "http://localhost/jimmy/".$val;
    return "<script>window.location.replace('".$joinLink."');</script>";
}

?>