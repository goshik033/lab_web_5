<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `smth1` where id=$id";
        $conn->query($sql);
    }
    header('location:/laba_web_4/index.php?page=list');
    exit;
?>