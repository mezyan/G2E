<div class="ligne">
    <div class="col-gauche">
        <div class="v-haut header-user">
            <h2> Se connecter </h2>
        </div>
        <br><br><br><br>
        <div class="centre">
            <form action="index.php?cible=utilisateurs&fonction=connexion" method="post">
                <label for="input_login">Login: </label>
                <input id="input_login" type="text" placeholder="Entrez un identifiant" name="identifiant" required>
                <label for="input_password">Mot de passe: </label>
                <input id="input_password" type="password" placeholder="Entrez un mot de passe" name="motdepasse"
                       required>
                <br>
                <label for="check_remember">Se souvenir: </label>
                <input id="check_remember" type="checkbox" checked="checked" name="remember">
                <div class="droite">
                    <label>
                        <a href="#">Mot de passe oublié?</a>
                    </label>
                </div>
                <input type="submit" value="Connexion" align="center" class="boutonConnexion"/>
            </form>
        </div>
    </div>

    <div class="col-droite">
        <div class="v-haut header-user">
            <h2>S'inscrire</h2>
            <br>
        </div>
        <br>
        <div class="v-centre">
            <form method="post" action="index.php?cible=utilisateurs&fonction=ajouter">
                <div class="adresse">
                    <input type="text" placeholder="Nom" name="nom-utilisateur" width="28" required>
                    <input type="text" placeholder="Prenom" name="prenom-utilisateur" width="28" required>
                </div>
                <div class="adresse">
                    <input type="text" placeholder="N° de Rue" name="rue" width="28" required>
                    <input type="text" placeholder="Nom de la voie" name="voie" width="28" required>
                </div>
                <input type="text" placeholder="Complement d'adresse (facultatif)" name="complement" width="28">
                <input id="mail" type="text" placeholder="email@email.fr" name="email-utilisateur" width="28" required>
                <input type="text" placeholder="XXXXXXXXXX" name="numero-utilisateur" width="28" required>
                <input type="password" placeholder="entrez un mot de passe" name="password-utilisateur" width="28"
                       required>
                <input type="password" placeholder="confirmez le mot de passe" name="passwd-utilisateur2" width="28"
                       required>
                <select name="type-utilisateur">
                    <option> Utilisateur</option>
                    <option> Promoteur</option>
                    <option> Mairie</option>
                    <option> Commercial</option>
                    <option> Administrateur</option>
                </select>
                <div class="v-bas">
                    <input id="suivant" name="submit" class="boutonInscription" type="submit">
                </div>
            </form>
        </div>
    </div>
</div>

<a href="index.php?cible=utilisateurs&fonction=inscription">Planning</a>
<br>
<a href="index.php?cible=habitation&fonction=accueil">Arrosage</a>
<br>
<a href="index.php?cible=Commercial&fonction=accueil">Commercial</a>
<br>
<a href="index.php?cible=Commercial&fonction=acc">Erreur 404</a>


<?php
/*
 TODO: Utiliser les polices adaptatives
 TODO: Barre de navigation
 */
?>
