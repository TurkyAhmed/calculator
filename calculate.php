<?php
require_once("calculation.php");

if (isset($_POST['action']) && $_POST['action'] === 'calculate') {
    $calculator = new standrad();

    $a = floatval($_POST['a']);
    $b = floatval($_POST['b']);
    $operator = $_POST['operator'];

    switch ($operator) {
        case '+':
            $result = $calculator->sum($a, $b);
            break;

        default:
            $result = 'Invalid operator';
    }
    
    echo json_encode( $result);
    exit;
}

