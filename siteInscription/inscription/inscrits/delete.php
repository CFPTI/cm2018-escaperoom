<?php
require_once "fonctionsBD.inc.php";
echo "<p>Voulez-vous vraiment supprimé ce rendez-vous ?</p>";
echo "<form action='#' method='POST'>";
echo "<button name='Ok'>Oui</button>";
echo "<button name='Non'>Non</button>";
echo "</form>";
if (isset($_POST['Ok'])) {
    deleteRdv();
} else if (isset($_POST['Non'])) {
    header("location:inscrit.php");
}
