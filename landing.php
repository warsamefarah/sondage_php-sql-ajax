<?php
session_start();
if (!isset($_SESSION['user']))
    header('Location:index.php');

    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bienvenue</title>
</head>

<body>
    <header>

        <nav>
            <a href="landing.php">
                <li>Home</li>
            </a>
            <a href="amis.php">
                <li>Mes contacts</li>
            </a>
            <a href="contact.php">
                <li>Créer un sondage</li>
            </a>
            <a href="contact.php">
                <li>Résultat Sondage</li>
            </a>

        </nav>

        <section id="user">
            <div>
                <h1>Bonjour ! <?php echo $_SESSION['user']; ?></h1>
            </div>
            <div>
                <a href="deconnexion.php" class="btn btn-danger btn-lg">Deconnexion</a>
            </div>
        </section>
    </header>
    


</body>

</html>