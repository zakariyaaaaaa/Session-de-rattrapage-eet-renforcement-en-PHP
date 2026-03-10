<?php
session_start(); // nbdaw session bach n9adro nst3mlo les données dyal l'utilisateur
$total = 0; // variable bach njma3o total dyal la facture
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Facture</title>
<link rel="stylesheet" href="style.css"> 
</head>
<body>

<h2>Facture</h2>


<table border="1">

<tr>
<th>Produit</th>
<th>Quantité</th>
<th>Prix</th>
<th>Total</th>
</tr>

<?php
// nkharjou tous les produits mn session
foreach($_SESSION["produits"] as $p)
{
    $t = $p["prix"] * $p["qte"]; // calcul total dyal produit (prix * quantité)
    $total += $t; // njma3o f total général

    echo "<tr>";
    echo "<td>".$p["nom"]."</td>"; 
    echo "<td>".$p["qte"]."</td>"; 
    echo "<td>".$p["prix"]."</td>"; 
    echo "<td>".$t."</td>";         
    echo "</tr>";
}
?>

<tr>
<td colspan="3">Total à payer</td>
<td><?php echo $total; ?></td> 
</tr>

</table>

</body>
</html>