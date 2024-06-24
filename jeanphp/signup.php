<?php
    session_start();
    require "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['nom']);
    $lname = mysqli_real_escape_string($conn, $_POST['prenom']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);

    if(!empty($fname) && !empty($lname) && !empty($mail) && !empty($pass1) && !empty($pass2)){
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            if($pass1 === $pass2 && strlen($pass2) > 7){
                $mail_verif = mysqli_query($conn, "SELECT mail FROM users WHERE mail = '{$mail}'");
                if(mysqli_num_rows( $mail_verif) == 0){
                    if(!isset($_FILES['profle'])){
                        $profil_name = $_FILES['profil']['name'];
                        $image_type = $_FILES['profil']['type'];
                        $tmp_name = $_FILES['profil']['tmp_name'];
            
                        $explode = explode('.', $profil_name);
                        $image_ext = end($explode);
                        $ext_avble = ['jpg', 'jpeg', 'png'];

                        if(in_array($image_ext, $ext_avble)){
                            $time = time();
                            $profil_name = $time.$profil_name;
                            $move_file = move_uploaded_file($tmp_name, "../profiles/".$profil_name);
                            if($move_file){
                                
                                $time = time();
                                $unik_id = rand($time, 100000000);
                                $statut = "Online";

                                $sql1 = "INSERT INTO users (unique_id, fname, lname, mail, pass, profil, statut) VALUE ({$unik_id}, '{$fname}', '{$lname}', '{$mail}', '{$pass1}', '{$profil_name}', '{$statut}')";
                                if(mysqli_query($conn,$sql1)){
                                    $qry2 = mysqli_query($conn, "SELECT * FROM users WHERE mail = '{$mail}'");
                                    if(mysqli_num_rows($qry2) > 0){
                                        $row = mysqli_fetch_row($qry2);
                                        $_SESSION['unique_id'] = $row[1];
                                        echo "succes";
                                    }
                                }else{
                                    echo "Erreur liée au serveur veuillez réessayer !";
                                }
                            }
                        }else{
                            echo 'Selectionnez une image de type - jpg, png, jpeg!';
                        }
                    }else{
                        echo 'Veuillez choisir une image pour votre profile!';
                    }
                }else{
                    echo $mail." - est déjà utilisée !";
                }
            }else{
                echo "Choisissez un bon mot de passe";
            }
        }else{
            echo $mail." n'est pas une adresse mail valable";
        }
    }else{
        echo "Veuillez remplir tous les champs!";
    }
