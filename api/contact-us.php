<?php

$json = json_encode(['status' => 'failed', 'msg' => 'Please fill out the form correctly']);

if($_POST){
    $data = array_map('sanitize', $_POST);
    $name = filter_var($data['name'], FILTER_SANITIZE_STRING);
    $email1 = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
    $email = filter_var($email1, FILTER_VALIDATE_EMAIL);
    $phone = filter_var($data['phone'], FILTER_SANITIZE_STRING);
    $department = filter_var($data['department'], FILTER_SANITIZE_NUMBER_INT);
    $content = filter_var($data['content'], FILTER_SANITIZE_STRING);


    if(!empty($name) && !empty($email) && !empty($phone) && !empty($department) && !empty($content)){
        include_once('../db/db.php');
        $db = new DB();

        $stmt = $db->prepare('INSERT INTO leads (fullname, email, phone, department_id, content)
                                        VALUES (?,?,?,?,?)');

        $stmt->execute([$name, $email, $phone, $department, $content]);
        echo json_encode(['status' => 'success']);
    } else {
        echo $json;
    }
} else {
    echo $json;
}

function sanitize($var){
    $var = strip_tags($var);
    $var = stripslashes($var);
    $var = htmlentities($var);
    return trim($var);
}