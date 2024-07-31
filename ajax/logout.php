<?php
    require_once('../core/init.php');
    $user->logout();
    header('Content-Type: application/json');
    echo json_encode(['status' => 'success']);
?>
