<?php
    session_start();
    require("config.php");
    $req = mysqli_query($conn, "SELECT * FROM users");
    $show = "";
    if(mysqli_num_rows($req) == 1){
        $show = "Auncun membre connecté !";
    }elseif(mysqli_num_rows($req) > 0){
        $send_msg_id = $_SESSION['unique_id'];
        while($row = mysqli_fetch_assoc($req)){
            $req1 = "SELECT * FROM messages WHERE (received_msg_id = {$row['unique_id']} OR send_msg_id = {$row['unique_id']}) AND (send_msg_id = {$send_msg_id} OR received_msg_id = {$send_msg_id}) ORDER BY msg_id DESC LIMIT 1";
            $qry1 = mysqli_query($conn, $req1);
           
            if(mysqli_num_rows($qry1) > 0){
                $row1 = mysqli_fetch_assoc($qry1);
                $result = $row1['sms'];
                (strlen($result) > 20) ? $sms = substr($result, 0 ,20).'...' : $sms = $result;
                ($send_msg_id == $row1['send_msg_id']) ? $you = "You : " : $you = "";
                ($row['statut'] !== "Online") ? $statut = "offline" : $statut = ""; 
    
                if($row['unique_id'] !== $send_msg_id){
                    $show .= ' <a href="chatarea.php?user_id='. $row['unique_id'] .'">
                                    <div class="contents">
                                    <img src="profiles/'. $row['profil'].'" alt="profil">
                                    <div class="details">
                                        <span>'. $row['fname']." " . $row['lname'] .'</span>
                                        <p>'.$you .$sms.'</p>
                                    </div>
                                    </div>
                                    <div class="statut '.$statut.'"><i class="bx bxs-circle"></i></div>
                                </a>';
                }
    
            }else{
                $result = "Aucun message disponible";
                ($row['statut'] !== "Online") ? $statut = "offline" : $statut = ""; 
    
                if($row['unique_id'] !== $send_msg_id){
                    $show .= ' <a href="chatarea.php?user_id='. $row['unique_id'] .'">
                                    <div class="contents">
                                    <img src="profiles/'. $row['profil'].'" alt="profil">
                                    <div class="details">
                                        <span>'. $row['fname']." " . $row['lname'] .'</span>
                                        <p>'.$result.'</p>
                                    </div>
                                    </div>
                                    <div class="statut '.$statut.'"><i class="bx bxs-circle"></i></div>
                                </a>';
                }
                
                
                
            }
        
                
        
        }
        
    }
    echo $show;
 ?>   

