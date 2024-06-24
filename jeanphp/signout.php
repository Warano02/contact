<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        require("config.php");
        $signout_id = $_GET['signout_id'];

        if($signout_id){
            require("date.php");

            $sql = mysqli_query($conn, "UPDATE users SET statut = '{$statut}' WHERE unique_id = {$signout_id}");
            session_unset();
            session_destroy();
            header("Location: ../signin.php");
            
        }else{
            header("Location: ../users.php");
        }
    }else{
        header("Location: ../signin.php");
    }
?>