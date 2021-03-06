<script src="vue/js/accueil.js" defer async></script>
<?php if (!isset($_SESSION['user_id'])) { ?>
    <div class="ligne">
        <div class="col-gauche">
            <div class="v-haut header-user">
                <h2> Se connecter </h2>
            </div>
            <br><br><br><br>
            <div class="centre">
                <form action="index.php?cible=utilisateurs&fonction=connexion" method="post">
                    <label for="input_login">Login: </label>
                    <?php
                    if (isset($_COOKIE['email'])) {
                        echo "<input id='input_login' class='user-input' type='email' placeholder='Entrez un identifiant'  name='identifiant' required value='" . $_COOKIE['email'] . "'>";
                    } else {
                        echo "<input id='input_login' class='user-input' type='email' placeholder='Entrez un identifiant'  name='identifiant' required>";
                    }
                    ?>
                    <!--<input id="input_login" type="text" placeholder="Entrez un identifiant" name="identifiant" required>-->
                    <label for="input_password">Mot de passe: </label>
                    <input id="input_password" class='user-input' type="password" placeholder="Entrez un mot de passe"
                           name="motdepasse"
                           required autocomplete>
                    <br>
                    <label for="check_remember">Se souvenir: </label>
                    <input id="check_remember" type="checkbox" name="remember">
                    <div class="droite">
                        <label>
                            <a id="link-to-passwd" href="#forget_passwd">Mot de passe oublié?</a>
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
                        <input type="text" class='user-input' placeholder="Nom*" name="nom-utilisateur" width="28"
                               required>&nbsp;&nbsp;
                        <input type="text" class='user-input' placeholder="Prenom*" name="prenom-utilisateur" width="28"
                               required>
                    </div>
                    <div class="adresse ">
                        <input id="mail" type="email" class='user-input'
                               placeholder="Adresse mail de la forme : nom@domaine.fr*" name="email-utilisateur"
                               width="28"
                               required>&nbsp;&nbsp;
                        <input type="text" class='user-input' placeholder="Téléphone*" name="numero-utilisateur"
                               width="28"
                               required>
                    </div>
                    <input type="password" class='user-input tooltip' placeholder="Entrez un mot de passe*"
                           name="password-utilisateur" id="password-utilisateur" width="28"
                           title="8 charactères, 1 lettre min et MAJ, 1 chiffre"
                           required autocomplete>
                    <input type="password" class='user-input' placeholder="Confirmez le mot de passe*"
                           name="passwd-utilisateur2" id="password-utilisateur2" width="28"
                           required autocomplete>
                    <input type="text" class="user-input" placeholder="Numéro de série du CeMac" name="cemac-number">
                    <label for="type-utilisateur"></label>
                    <select id="type-utilisateur" name="type-utilisateur">
                        <option value="1"> Utilisateur</option>
                        <option value="2"> Technicien</option>
                        <option value="3"> Commercial</option>
                        <option value="4"> Mairie</option>
                    </select>
                    <br/>
                    <p>
                        <input type="checkbox" id="cgu_check" name="cgu_check" required/>
                        <label for="cgu_check">Accepter les <a id="link-to-cgu" href="#cgu">conditions
                                générales d'utilisation</a></label>

                    <div class="v-bas">
                        <input id="suivant" name="submit" class="boutonInscription" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MOT DE PASSE OUBLIE -->
    <div class="modal centre" id="forget_passwd">
        <div class="modal-content">
            <form method="POST" action="#">
                <div class="modal-header space-between">
                    <h5 class="centre">Récupérez votre mot de passe</h5>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <p> Afin de récupérer votre mot de passe, entrez votre adresse mail.<br>
                        Un mot de passe vous sera envoyé par mail</p>
                    <input type="text" placeholder="entrez votre adresse mail" name="mail-user"/>
                    <br>
                    <input type="submit" class="boutonConnexion">
                </div>
                <div class="modal-footer droite">
                    <input type="button" value="Annuler" class="btn-modal-submit"
                           onclick="document.getElementById('forget_passwd').style.display = 'none';">
                </div>
            </form>
        </div>
    </div>
    <!-- MODAL DE CGU -->
    <div class="modal centre" id="cgu">
        <div class="modal-content">
            <!--<script>console.log(document.getElementById("test").textContent)</script>-->
            <div class="modal-body">
                <h1 class="v-haut header-user"> Article 1: Notion</h1>
                <p>
                    Les présentes « conditions générales d'utilisation » ont pour objet l'encadrement juridique des
                    modalités de mise à disposition des services du site [Nom du site] et leur utilisation par «
                    l'Utilisateur ».
                    Les conditions générales d'utilisation doivent être acceptées par tout Utilisateur souhaitant
                    accéder au site. Elles constituent le contrat entre le site et l'Utilisateur. L’accès au site par
                    l’Utilisateur signifie son acceptation des présentes conditions générales d’utilisation.
                    Éventuellement :
                </p>
                <ul>
                    <li>En cas de non-acceptation des conditions générales d'utilisation stipulées dans le présent
                        contrat, l'Utilisateur se doit de renoncer à l'accès des services proposés par le site.
                    </li>
                    <li>Ecorain se réserve le droit de modifier unilatéralement et à tout moment le contenu des
                        présentes conditions générales d'utilisation.
                    </li>
                </ul>
                <h1 class="v-haut header-user"> Article 2: Définition </h1>
                <p>
                    La présente clause a pour objet de définir les différents termes essentiels du contrat :
                </p>
                <ul>
                    <li>Utilisateur : ce terme désigne toute personne qui utilise le site ou l'un des services proposés
                        par le site.
                    </li>
                    <li>Contenu utilisateur : ce sont les données transmises par l'Utilisateur au sein du site.</li>
                    <li>Membre : l'Utilisateur devient membre lorsqu'il est identifié sur le site.</li>
                    <li>Identifiant et mot de passe : c'est l'ensemble des informations nécessaires à l'identification
                        d'un Utilisateur sur le site. L'identifiant et le mot de passe permettent à l'Utilisateur
                        d'accéder à des services réservés aux membres du site. Le mot de passe est confidentiel.
                    </li>
                </ul>
                <h1 class="v-haut header-user"> Article 3: Accès aux services </h1>
                <p>
                    Le site permet à l'utilisateur un accès gratuit aux services suivants :
                    <strong>[Gestion de l'arrosage] ;</strong>
                    <strong>[Accès aux statistiques] ;</strong>
                    <strong>[Données de consommation] ;</strong>
                    <strong>[publication de commentaires] ;</strong>
                    […].
                    Le site est accessible gratuitement en tout lieu à tout Utilisateur ayant un accès à Internet. Tous
                    les frais supportés par l'Utilisateur pour accéder au service (matériel informatique, logiciels,
                    connexion Internet, etc.) sont à sa charge.
                    Selon le cas :
                <ul>
                    <li>L’Utilisateur non membre n'a pas accès aux services réservés aux membres. Pour cela, il doit
                        s'identifier à l'aide de son identifiant et de son mot de passe.
                    </li>
                    <li>Le site met en œuvre tous les moyens mis à sa disposition pour assurer un accès de qualité à ses
                        services. L'obligation étant de moyens, le site ne s'engage pas à atteindre ce résultat.
                    </li>
                    <li>Tout événement dû à un cas de force majeure ayant pour conséquence un dysfonctionnement du
                        réseau ou du serveur n'engage pas la responsabilité de [Nom du site].
                    </li>
                    <li>L'accès aux services du site peut à tout moment faire l'objet d'une interruption, d'une
                        suspension, d'une modification sans préavis pour une maintenance ou pour tout autre cas.
                        L'Utilisateur s'oblige à ne réclamer aucune indemnisation suite à l'interruption, à la
                        suspension ou à la modification du présent contrat.
                    </li>
                    <li>L'Utilisateur a la possibilité de contacter le site par messagerie électronique à l’adresse
                        <strong>[contact.ecorain@messagerie.com]</strong>.
                </ul>
            </div>
            <div class="modal-header">
                <h5>Conditions générales d'utilisation: </h5>
                <span class="close">&times;</span>
            </div>
            <div class="modal-footer droite">
                Cliquez à l'extérieur de la popup pour quitter les CGU.
            </div>
        </div>
    </div>

<?php } else { ?>

    <nav class="navbar">
        <ul class="navbar">
            <li class="navitem active"><a href="index.php">Catalogue</a></li>
            <li class="navitem"><a href="index.php?cible=habitation&fonction=accueil">Maison</a></li>
            <li class="navitem"><a href="index.php?cible=habitation&fonction=stats">Statistiques</a></li>
        </ul>
    </nav>
    <!--
        <h1><a href="index.php?cible=planning&fonction=accueil">Planning</a></h1>
        <br>
        <h1><a href="index.php?cible=habitation&fonction=accueil">Arrosage</a></h1>
        <br>
        <h1><a href="index.php?cible=Commercial&fonction=accueil">Commercial</a></h1>
        <br>
        <h1><a href="index.php?cible=Mairie&fonction=accueil">Publication</a></h1>
        <h1><a href="index.php?cible=utilisateurs&fonction=faq">Faq</a></h1>-->
    <table class="gallery" cellpadding="30px">
        <tr>
            <td>Arroseur multi surface <br><img src="vue/images/multisurface.png" alt=""><br>
                <button class="prix" style="vertical-align:middle">15€
            </td>
            <td>Arroseur grande surface <br><img src="vue/images/grandesurface.png" alt=""><br>
                <button class="prix" style="vertical-align:middle">10€
            </td>
        </tr>
        <tr>
            <td>Aspergeur classique <br><img src="vue/images/aspergeurclassique.png" alt=""><br>
                <button class="prix" style="vertical-align:middle">7.5€
            </td>
            <td>Arroseur compte goutte d'extérieur<br><img src="vue/images/comptegoutteexte.png" alt=""><br>
                <button class="prix" style="vertical-align:middle">5€
            </td>
        </tr>
        <tr>
            <td>Arroseur compte goutte d'intérieur <br><img src="vue/images/comptegoutteinte.jpg" alt=""><br>
                <button class="prix" style="vertical-align:middle">5€
            </td>
            <td></td>
        </tr>
    </table>

<?php }
/*
 TODO: Utiliser les polices adaptatives
 */
?>
