<?php
session_start();
require_once 'config.php';

if (isset($_GET['user'])) {
    $user = (string) trim($_GET['user']);

    $req = $bdd->prepare("SELECT *
      FROM user
      WHERE pseudo LIKE ?");
    $req->execute(array("$user%")); //toujours prepare avant d'execute quand il y a des parametres

    $req = $req->fetchALL();

    foreach ($req as $r) {
?>
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc"><?= $r['pseudo'] ?></div><button class="btn btn-info"><a href ='action.php?action=add&username=". $data[$i]['username'] ."'>AJOUTER</a></button><?php
                                                                                            }
                                                                                        }
                                                                                                ?>