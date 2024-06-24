<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    require("config.php");
    $send_id =  $_POST['send'];
    $received_id = $_POST['received'];
    $show = "";

    $req = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.received_msg_id WHERE (send_msg_id = '{$send_id}' AND received_msg_id = '{$received_id}') OR (send_msg_id = '{$received_id}' AND received_msg_id = '{$send_id}') ORDER BY msg_id ASC";
    $sql = mysqli_query($conn, $req);
    if (mysqli_num_rows($sql) > 0) {
        while ($row1 = mysqli_fetch_assoc($sql)) {

            if ($row1['send_msg_id'] === $send_id) {
                $show = $show . '<div class="msg outgoing">
                                    <div class="details">
                                        <p>' . $row1['sms'] . '</p>
                                    </div>
                                    </div>';
            } else {
                $req2 = "SELECT profil FROM users WHERE unique_id = {$received_id}";
                $qry2 = mysqli_query($conn, $req2);
                $row2 = mysqli_fetch_assoc($qry2);
                $show = $show . '<div class="msg incoming">
                                    <img src="profiles/' . $row2['profil'] . '" alt="profil">
                                    <div class="details">
                                        <p>' . $row1['sms'] . '</p>
                                    </div>
                                    </div>';
            }
        }
        echo $show;
    }
} else {
    header("Location:../signin.php");
}
