<?php
$titre="Profile";
?>
 
<?php $__env->startSection('content'); ?>
    
<div class="profil-flex_general contenu">
    
    <div>
        <!--Entête du profil-->
        <div class="profil-entete">
            <img src="img\photo_profil.png" alt="photo de profil">
            <div class="profil-entete_nom-desc">
                <span class="profil-entete_nom">Pingui K. / Team</span>
                <span class="profil-entete_desc">J’aime les donuts sucrés au sucre. Je suis italien et ferrero est ma passion. Je n’aime pas le sport je préfère le chocolat et les kinder bueno. </span>
            </div>
        </div>
    </div>

    <div class="profil-flex_general2">

        <div class="filacc-flex1">
            <!--Demances d'amis-->
            <div class="profil-demande">
                <div class="profil-demande_amis">
                    <span class="profil-demande_th">1 Demande(s) d’A<span class="fillacc-amis_titre_rouge">mis</span></span>
                        <div class="profil-demande_nom_div">
                            <span class="profil-demande_nom">Chocolat au sel <a href="index.php?action=ok.php"> <img class="bouton" src="img\ok.png" alt="Accepter"> </a> <a href="index.php?action=non.php"> <img class="bouton" src="img\croix.png" alt="Refuser"> </a> </span>
                            <span class="profil-demande_nom">Chocolat au sel <a href="index.php?action=ok.php"> <img class="bouton" src="img\ok.png" alt="Accepter"> </a> <a href="index.php?action=non.php"> <img class="bouton" src="img\croix.png" alt="Refuser"> </a> </span>
                        </div>
                </div>
                <div class="profil-demande_envoye">
                    <span class="profil-demande_th">1 Demande(s) d’A<span class="fillacc-amis_titre_rouge">mis</span> envoyées</span>
                        <div class="profil-demande_nom_div">
                            <span class="profil-demande_nom">Florent H.</span>
                            <span class="profil-demande_nom">Florent H.</span>
                        </div>
                </div>
            </div>

            <!--Envoie d'un message -->
            <form action="index.php?action=connexion" method="POST">
                <textarea class="zone_txt filacc-zone_envoie" name="post" id="post" placeholder="Quel kinder mangez-vous aujourd’hui ?"></textarea>

                <div class="filacc-zone_envoie_bouton">
                    <a href="index.php?action=addimg"><img class="bouton" src="img\ajout_image.png" alt="Ajouter une image"></a>
                    <input class="bouton" type="submit" name="envoyer" id="envoyer" value="Envoyer sur le fil d’actualité">
                </div>
            </form>

            <!--Affichage des post-->
            <div class="filacc-post">
                <div class="filacc-post-info">
                    <span class="filacc-post_auteur">{$poste['idAuteur']}</span>
                    <span class="filacc-post_date">Posté le : {$poste['dateEcrit']}</span>
                    <span class="filacc-post_supp"><a href="index.php?action=supprimer"><img src="img\poubelle.png" alt="poubelle">Supprimer</a></span>
                </div>
                <div class="filacc-post_titre_contenu">
                    <!--<span class="filacc-post_titre">{$poste['titre']}</span>-->
                    <span class="filacc-post_contenu">{$poste['contenu']}</span>
                    <span class="filacc-post_img"><img src="img\animal_bizare.jpg" alt="img"></span>
                </div>
            </div>
        </div>

        <!--Affichage des amis-->
        <div class="filacc-flex2">
            <div class="filacc_amis">
                <span class="fillac-amis_titre">A<span class="fillacc-amis_titre_rouge">mis</span></span>

                <div class="filacc-amis_chercher">
                    <input class="zone_txt" id="saisieFiltreAmis" type="texte" placeholder="Chercher un amis">
                    <!--<button class="haut-btn_chercher" type="submit"><img src="img\loupe.png" alt="Rechercher"></button>-->
                </div>

                <ul class="filacc-amis_ul" id="ulFiltreAmis">
                    <li class="filacc-amis_liste">
                        <a href="index.php?action=amis{$_GET['id']}"><span class="filacc-amis_nom">Dupond</span> <span class="filacc-amis_groupe">/Groupe</span></a>
                        <span class="filacc-ami_status">En ligne <img src="img\en_ligne.png" alt="en ligne"></span>
                    </li>

                    <li class="filacc-amis_liste">
                        <a href="index.php?action=amis{$_GET['id']}"><span class="filacc-amis_nom">Marcel</span> <span class="filacc-amis_groupe">/Groupe</span></a>
                        <span class="filacc-ami_status">En ligne <img src="img\en_ligne.png" alt="en ligne"></span>
                    </li>
                 </ul>
            </div>
        </div>

    </div>

</div>
    

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>