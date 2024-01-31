<?php
session_start();
header('Content-Type: application/json');
$isAuthenticated = isset($_SESSION['customer_id']);
echo json_encode(['isAuthenticated' => $isAuthenticated]);
