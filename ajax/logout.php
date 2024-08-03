<?php
require_once('../app/init.php');
use App\Support\Auth;
Auth::logout();
header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
