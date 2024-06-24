<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("Location:signin.php");
    }
?>

<!--Coding by Jean Calvain Doumba -- Futur Web developper -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Chat Area</title>
</head>
<body>
    </body>
    <?php
        require("jeanphp/config.php");
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
            if(mysqli_num_rows($sql) > 0){ $row = mysqli_fetch_assoc($sql);}
     ?>
    <div class="wrapper">
        <section class="msg-area">
            <header> 
                <a href="users.php" class="back-icon"><i class='bx bx-arrow-back' ></i></a>  
                <img src=<?php echo "profiles/".$row['profil'] ?> alt="profil">
                <div class="details">
                    <span><?php echo $row['fname']." ".$row['lname'] ?></span>
                    <p><?php echo $row['statut'] ?></p>
                </div>
            </header>
            <div class="msg-box">
                
                
            </div>
            <form action="#" class="typing-area">
                <input type="text" name="send" value="<?php echo $_SESSION['unique_id'] ?>" hidden>
                <input type="text" name="received" value="<?php echo $user_id?>" hidden>
                <input type="text" name="msg" class="input" placeholder="Type a message here...">
                <button><i class='bx bxs-send' ></i></button>
            </form>
        </section>
    </div>
    <script src="management-js/chat.js"></script>
</body>
</html>