<?php
    session_start();
    require "config.php";
    
    $mail = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['mdp']);
     
    if(!empty($mail) && !empty($pass)){

        $sql = mysqli_query($conn, "SELECT * FROM users WHERE mail = '{$mail}' AND pass = '{$pass}'");

        if(mysqli_num_rows($sql) > 0){

            $row = mysqli_fetch_assoc($sql);
            $statut = "En ligne";
            $sql1 = mysqli_query($conn, "UPDATE users SET statut = '{$statut}' WHERE unique_id = {$row['unique_id']}");
            if($sql){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "succes";
            }else{
                echo "Erreur interne liée au serveur veuillez réessayer !";
            }
            
        }else{
            echo "Mot de passe ou email incorrecte ! ";
        }
    }else{
        echo "Veuillez remplir tous les champs !";
    }