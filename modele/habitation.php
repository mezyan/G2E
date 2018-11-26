<?php
/**
 * Created by PhpStorm.
 * User: bastien
 * Date: 20/11/2018
 * Time: 14:32
 */

require "modele/fonctions.php" ;

$tableHabitation = 'habitation';

//todo : ajouter l'id_user de la session en paramètre
function getHouses(PDO $bdd, string $table)
{
    return $bdd->query('SELECT '. $table. '.* FROM utilisateur INNER JOIN (habitation INNER JOIN habitation_utilisateur ON habitation.id_habit = habitation_utilisateur.id_habit) ON utilisateur.id_util = habitation_utilisateur.id_util WHERE (((utilisateur.id_util)=1))');
}
//todo : ajouter l'id_user de la session en paramètre
function addHouse(PDO $bdd, string $table)
{
    $houseName       = $_POST['house-name'];
    $houseNumber     = $_POST['house-number'];
    $houseRoute      = $_POST['house-route'];
    $houseCity       = $_POST['house-city'];
    $housePostalCode = $_POST['house-postal'];
    $houseCountry    = $_POST['house-country'];

//    Association des attributs de la base de donnée au valeurs récupérées du formulaire
    $attributs = array(
        'nom_habit' => $houseName,
        'numero_habit' => $houseNumber,
        'rue_habit' => $houseRoute,
        'ville_habit' => $houseCity,
        'code_postal_habit' => $housePostalCode,
        'pays_habit' => $houseCountry
    );
//    Insertion nouvelle habitation
    insert($bdd, $table, $attributs);

//    insertion id de la maison et de l'utilisateur dans habitation_utilisateur
    $idHabit = $bdd->lastInsertId();
    $tableHabitUtil = 'habitation_utilisateur';
    $attributsHabitUtil = array(
        'id_util' => 1,//$_SESSION['user_id'];
        'id_habit' => $idHabit
    );
    $addKeyHouse = insert($bdd, $tableHabitUtil, $attributsHabitUtil);

    if (!$addKeyHouse)
    {
        die("Une erreur est survenue lors de l'ajout de votre maison, veuillez ré-essayer \n" .$bdd->errorInfo);
    }
    else
    {
        header("Location: index.php?cible=habitation&fonction=accueil");
    }
}

function removeHouse(PDO $bdd, string $table, $idHouse)
{
    delete($bdd, $table, "id_habit=" . $idHouse);
}

function modifyHouse($id_user)
{

}