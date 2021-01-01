<?php

function var_dump_plus($expression) {
    echo '<pre>';
    var_dump($expression);
    echo '</pre>';
}

function discounted_price($val, $discount){
    return $val - ($val * $discount)/100;
}

?>