<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

include "modele/Habitation.php";
include "modele/Arroseur.php";
include "modele/Plante.php";
include "modele/Capteur.php";
include "modele/Zone.php";
include "modele/Model.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}

$head = '<link rel="stylesheet" href="vue/css/arrosage.css">';
$js   = '<script src="vue/js/arrosage.js"></script>';

$arroseur   = new Arroseur();
$habitation = new Habitation();

// Choix de la vue à afficher
switch ($fonction) {
    case "accueil":
        if (isset($_POST['house-select'])) {
            $maison                = $habitation->getHouseById($habitation->tableHabitation, $_POST['house-select']);
            $_SESSION['id_maison'] = $_POST['house-select'];
        } else {
            $maison                = $habitation->getHousebyUserId($habitation->tableHabitation, $_SESSION['user_id']);
            $_SESSION['id_maison'] = $maison['id_habit'];
        }
        $title = $maison['nom_habit'];
        $vue   = "arrosage";
        break;

    case "ajouter-arroseur":
        $arroseur->addArroseur($arroseur->tableArroseur, $_POST['zone-id-add-arr'], $_POST['select-plante-type'], $_POST['select-arroseur-type']);
        Database::redirect("habitation", "accueil");
        break;

    case "config-arroseur":
        $plante    = new Plante();
        $arr       = $arroseur->getArroseurInfoById($arroseur->tableArroseur, $_GET['id']);
        $planteArr = $plante->getPlantType($plante->tablePlante, $arr['id_plante']);
        $head      = '<link rel="stylesheet" href="vue/css/utilisateurs.css">' . '<link rel="stylesheet" href="vue/css/arrosage.css">';
        $title     = "Configuration de l'arroseur";
        $vue       = "infos-arroseur";
        break;

    case "update-arroseur":
        $arroseurId = $_POST['arroseur'];
        $zoneId     = $_POST['zone'];
        $checked    = $_POST['state'];
        $arroseur->updateArroseur($arroseur->tableArroseur, $checked, $arroseurId, $zoneId);
        $vue = null;
        break;

    case "add-capteur-to-arroseur":
        $idArroseur   = $_POST['arroseur'];
        $idCapteur    = $_POST['capteur'];
        $capteurState = $_POST['state'];
        $arroseur->addCapteurToArroseur("capteur", $idArroseur, $idCapteur, $capteurState);
        break;

    case "supprimer-arroseur":
        $arroseur->removeArroseur($arroseur->tableArroseur, $_POST['arr-id-delete-arr']);
        Database::redirect("habitation", "accueil");
        break;

    case "ajouter-zone":
        $zone = new Zone();
        $zone->addZone($habitation->tableZone, $_POST['id-house']);
        Database::redirect("habitation", "accueil");
        break;


    case "supprimer-zone":
        $zone = new Zone();
        $zone->removeZone($habitation->tableZone, $_POST['zone-id-delete-zone']);
        Database::redirect("habitation", "accueil");
        break;

    case "ajouter-maison":
        $habitation->addHouse($habitation->tableHabitation, $_SESSION['user_id']);
        Database::redirect("habitation", "accueil");
        break;

    case "get-house-info":
        $idMaison = $_POST['idmaison'];
        $habitation->getHouseInfos($habitation->tableHabitation, $idMaison);
        $vue = null;
        break;

    case "supprimer-maison":
        $habitation->removeHouse($habitation->tableHabitation, $_POST['id-house']);
        Database::redirect("habitation", "accueil");
        break;

    case "client-stat":
        $title = "Satistiques client";
        $vue   = "client-stats";
        break;
    case "stats":
        $head  = '<link rel="stylesheet" href="vue/css/client-stats.css">';
        $vue   = "client-stats";
        $js    = '<script src="vue/js/chart2.js" defer></script>' .
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>';
        $title = "Statistique de consommation, votre solution personalisée";
        break;

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
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