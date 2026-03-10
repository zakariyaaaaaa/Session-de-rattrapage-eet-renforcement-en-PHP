<?php
   session_start();// nbdaw session bach nkhdmo m3a donnees dyal lutilisateur

   require "data.php";// njibo les produits mn fichier data.php

   // ila ma kaynach session produits  ndirouha vide
  if (!isset($_SESSION["produits"])){
    $_SESSION["produits"]=[];
   }

   // ila form t3ammar o submit
   if($_SERVER["REQUEST_METHOD"]==="POST"){
    $select=$_POST["select"];
    $qte=$_POST["qte"];
    $messg="";


        // nkharjou tous les produits bach n9albou 3la li khiyar
    foreach($produits as &$p){
        if($p["nom"]==$select){// ila smiya katsawiha les choix
            if ($qte <= $p["stock"]){// ila quantité <= stock
                $p["stock"] -= $qte; // nqllsou stock
                $_SESSION["produits"][]=[// nzidou produit f session
                    "nom"=>$p["nom"],
                    "qte"=>$qte,
                    "stock"=>$p["stock"],
                    "prix"=>$p["prix"]
                ]; // n7afdou modifications f data.json
                file_put_contents("data.json", json_encode($produits));
            }
        }
    }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table border="2">
        <tr>
            <th>Nom</th>
            <th>prix</th>
            <th>stock</th>
        </tr>
    <?php
    // nkharjou produits mn session o n'affichiw
            foreach($_SESSION["produits"] as $p){
                echo "<tr>";
                echo "<td>" . $p["nom"] . "</td>";
                echo "<td>" . $p["prix"] . "</td>";
                echo "<td>" . $p["stock"] . "</td>";
                echo "</tr>";

            }
    ?>

    </table>
    <form method="POST">
        <select name="select">
                        <option value="">chois</option>

            <option value="Telephone">Telephone</option>
            <option value="Casque">Casque</option>
            <option value="Tablette">Tablette</option>
            <option value="Montre connectée">Montre connectée</option>
        </select>
        <input type="number" name="qte" required placeholder="entre votre Qte">
        <button type="submit">achete</button>
    </form>
    <a href="facture.php">votr link</a>
    
</body>
</html>