<?php

include "modele/User.php";
include "modele/Habitation.php";
require "modele/Gestion.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}

$habitation = new Habitation();

switch ($fonction) {
    case "accueil":
        $head    = '<link rel="stylesheet" href="vue/css/gestion.css">';
        $js      = '<script src="vue/js/gestion.js"></script>';
        $maisons = $habitation->getAllHousesFromUser($habitation->tableHabitation, $_SESSION['user_id']);
        $title   = "Gestion de vos maisons";
        $vue     = "gestion";
        break;

    case "ceder-maison":
        $gestion = new Gestion();
        $gestion->cederMaison("utilisateur", $_POST['id-maison-ceder'], $_POST['mail']);
        break;

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
        break;
}
if (isset($vue)) {
    include("vue/header.php");
    include("vue/" . $vue . ".php");
    include("vue/footer.php");
} elseif ($vue == null) {

} else {
    include("vue/header.php");
    include("vue/erreur404.php");
    include("vue/footer.php");
}