<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>SondageMax</title>
        </head>
        <body>

        <header>
            <h1>Voici le meilleur site de sondage de tous les temps !</h1>

            <div id="img">
            <img src="img/sticker-design-tige-de-fleur-3-ambiance-sticker-SI_0140.png" alt="">
            </div>




        </header>





        <legend>Veuillez vous <strong>connecter</strong> ou <strong>créer</strong> un compte pour continuer</legend>



        
        <div class="login-form">
        <?php    
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                                </div>
                                <?php
                                break;

                        case 'email':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                                </div>
                                <?php
                                break;

                        case 'already':
                            ?>
                            <div class="alert alert-danger">
                            <strong>Erreur</strong> compte non existant
                            </div>
                            <?php
                            break;
                    }
                }
        ?>

            <form action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <p class="text-center"><a href="inscription.php">Inscription</a></p>
        </div>

        </body>
</html>