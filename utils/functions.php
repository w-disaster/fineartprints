<?php

function var_dump_plus($expression) {
    echo '<pre>';
    var_dump($expression);
    echo '</pre>';
}

function send_data($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
}

?>