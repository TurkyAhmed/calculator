<?php
require_once("calculation.php");

if (isset($_POST['action']) && $_POST['action'] === 'calculate') {
    $calculator = new standrad();

    $a = floatval($_POST['a']);
    $b = floatval($_POST['b']);
    $operator = $_POST['operator'];

    if($operator=='+')
        $result = $calculator->sum($a, $b);
    else if($operator== '-')
        $result = $calculator->sub($a, $b);
    else if($operator== '*')
        $result = $calculator->multi($a, $b);
    else if($operator== '/')
        $result = $calculator->diviton($a, $b);
    else 
        $result = $calculator->diviton($a, $b);
    
    echo json_encode( $result);
    exit;
}

