<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        require("config.php");
        $send = mysqli_real_escape_string($conn, $_POST['send']);
        $received = mysqli_real_escape_string($conn, $_POST['received']);
        $msg = mysqli_real_escape_string($conn, $_POST['msg']);

        if(!empty($msg)){
            $sql = mysqli_query($conn, "INSERT INTO messages (send_msg_id, received_msg_id, sms) VALUES ({$send}, {$received}, '{$msg}')") or die();
        }
    }else{
        header("Location:../signin.php");
    }
?>