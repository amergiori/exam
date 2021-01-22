<?php
        
    include_once '../db/db.php';
    $db = new DB();

    $stmt = $db->query("SELECT * FROM leads");
    $dep = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dep);
