<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("Location:signin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Calvino Chat</title>
</head>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                    require("jeanphp/config.php");
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="contents">
                    <img src=<?php echo "profiles/".$row['profil'] ?> alt="profil">
                    <div class="details">
                        <span><?php echo $row['fname']." ".$row['lname'] ?></span>
                        <p><?php echo $row['statut'] ?></p>
                    </div>
                </div>
                <a href="jeanphp/signout.php?signout_id=<?php echo $row['unique_id'] ?>" class="logout">Se deconnecter</a>
            </header>
            <div class="search">
                <span class="text">Choisir un partenaire pour discuter</span>
                <input type="text" name="searchUser" placeholder="Recherer par nom...">
                <button><i class='bx bx-search-alt' ></i></button>
            </div>
            <div class="users-list">
               
            </div>
        </section>
    </div>
    <script src="management-js/user.js"></script>
    <script src="management-js/script.js"></script>
</body>
</html>