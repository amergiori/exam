<?php

include_once '../db/db.php';
$db = new DB();

$stmt = $db->query("SELECT * FROM departments");
$dep = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dep);
