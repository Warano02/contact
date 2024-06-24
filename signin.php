<!--Coding by Jean Calvain Doumba -- Futur Web developper -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Connexion</title>
</head>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Connexion</header>
            <form action="#">
                <div class="error-msg"></div>    
                 <div class="field input">
                    <label >Email</label>
                    <input type="email" name="email" placeholder="exemple@clv.com">
                </div>
                <div class="field input">
                    <label >Mot de passe</label>
                    <input type="password" name="mdp" placeholder="Mot de passe">
                    <i class='bx bx-show' ></i>
                </div>
                <div class="field bouton">
                    <input type="submit" value="Connexion">
                </div>
            </form>
            <div class="link">Pas encore incrit ? <a href="index.php">S'inscrir</a></div>
        </section>
    </div>
    <script src="management-js/app.js"></script>
    <script src="management-js/signin.js"></script>
</body>
</html>