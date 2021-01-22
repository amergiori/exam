<?php

if($_POST){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    include_once '../db/db.php';
    $db = new DB();
    
    $stmt = $db->prepare("DELETE FROM leads WHERE id=?");
    $res = $stmt->execute([$id]);
    $echo = $res ? json_encode(['stauts' => 'success']) : json_encode(["status" => "failed", 'msg' => 'Couldn\'t find row']);
    echo $echo;
} else {
    echo json_encode(["status" => "failed", 'msg' => 'Wrong/No ID']);
}

