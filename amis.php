<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['user']))
    header('Location:index.php');

$query = $bdd->prepare('SELECT * FROM friends WHERE username_1 = :username_1 OR username_2 = :username_2');
$query->execute([
    ":username_1" => $_SESSION['user'],
    ":username_2" => $_SESSION['user']
]);

$data = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mes amis</title>
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
    </header>
    <main>


        <section>

            <h2>Ma liste d'amis</h2>

            <?php
            for ($i = 0; $i < sizeof($data); $i++) {
                if ($data[$i]['username_1'] == $_SESSION['user']) {

                    echo $data[$i]['username_2'] . " <a href='action.php?action=delete&id=" . $data[$i]['id'] . "'>Supprimer l'ami</a>";

                    if ($data[$i]['is_pending'] == true)
                        echo "(en attente d'être accepté)";
                } else {


                    if ($data[$i]['is_pending'] == false) {

                        echo $data[$i]['username_1'] . " <a href='action.php?action=delete&id=" . $data[$i]['id'] . "'>Supprimer l'ami</a>";
                    }
                }

                echo '<br />';
            }




            ?>



        </section>
        <section>

            <h2>Demande d'ami</h2>

            <?php
            for ($i = 0; $i < sizeof($data); $i++) {
                if ($data[$i]['is_pending'] == true && $data[$i]['username_2'] == $_SESSION['user']) {

                    echo $data[$i]['username_1'] . "<a href='action.php?action=delete&id=" . $data[$i]['id'] . "'>Accepter</a> <a href='action.php?action=delete&id=" . $data[$i]['id'] . "'>Refuser</a>";
                }
            }
            ?>




        </section>
        <section>

            <div class="row">
                <div class="col-sm-0 col-md-2 col-lg-3"></div>
                <div class="col-sm-12 col-md-8 col-lg-6">
                    <div class="form-group">
                        <input class="form-control" type="text" id="search-user" value="" placeholder="Rechercher un ou plusieurs utilisateurs" />
                    </div>
                    <div id="result-search"></div> <!-- C'est ici que nous aurons nos résultats de notre recherche -->
                </div>
            </div>
            </div>
            </div>

        </section>



    </main>


    <script>
        $(document).ready(function() {
            $('#search-user').keyup(function() {
                $('#result-search').html('');

                var utilisateur = $(this).val();
                if (utilisateur != "") {
                    $.ajax({
                        type: 'GET',
                        url: 'search_user.php',
                        data: 'user=' + encodeURIComponent(utilisateur),
                        success: function(data) {
                            if (data != "") {
                                $('#result-search').append(data);
                            } else {
                                document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun utilisateur</div>"
                            }
                        }
                    });
                }
                console.log(utilisateur);
            });
        });
    </script>
</body>

</html>