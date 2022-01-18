<?php
    $titre = "Profil";
?>
 
<?php $__env->startSection('content'); ?>
    
<div class="profil-flex_general contenu">
    
    <div>
        <!--Entête du profil-->
        <div class="profil-entete">
            <img src="img\photo_profil.png" alt="photo de profil">
            <div class="profil-entete_nom-desc">
                <span class="profil-entete_nom"><?php echo e($user['login']); ?> / <?php echo e($user['genre']); ?></span>
                <span class="profil-entete_desc"><?php echo e($user['description']); ?></span>
                <span class="profil-entete_modif"><a href='index.php?action=modifier-profile'>Modifier le profil</a></span>
            </div>
        </div>
    </div>

    <div class="profil-flex_general2">

        <div class="filacc-flex1">
            <!--Demances d'amis-->

            <?php if($_SESSION['id'] == $user['id']): ?>
            <div class="profil-demande">
                <div class="profil-demande_amis">
                    <span class="profil-demande_th">
                        <?= $nbr_demandes_amis ?> Demande<?= (!empty($nbr_demandes_amis) && $nbr_demandes_amis >= 2) ? 's' : '' ?>
                        d’A<span class="fillacc-amis_titre_rouge">mis</span></span>
                        <div class="profil-demande_nom_div">
                            <input type="hidden" name="id" value=<?php echo e($user['id']); ?>>
                            
                            <?php foreach ($demande_amis as $key => $futur_ami) : ?>
                                <span class="profil-demande_nom">
                                    <?= ucfirst($futur_ami->login) ?>
                                    <a href="index.php?action=confirmer_amis&id=<?= $futur_ami->envoyeur ?>"> 
                                        <img class="bouton" src="img\ok.png" alt="Accepter"> 
                                    </a> 
                                    <!-- <a href="index.php?action=deleted">  -->
                                    <a href="index.php?action=deleted&id=<?= $futur_ami->envoyeur ?>">
                                        <img class="bouton" src="img\croix.png" alt="Refuser"> 
                                    </a> 
                                </span>
                            <?php endforeach; ?>

                            <!-- <span class="profil-demande_nom">
                                Chocolat au sel 
                                <a href="index.php?action=ok.php"> 
                                    <img class="bouton" src="img\ok.png" alt="Accepter"> 
                                </a> 
                                <a href="index.php?action=non.php"> 
                                    <img class="bouton" src="img\croix.png" alt="Refuser"> 
                                </a> 
                            </span>
                            <span class="profil-demande_nom">
                                Chocolat au sel 
                                <a href="index.php?action=ok.php"> 
                                    <img class="bouton" src="img\ok.png" alt="Accepter"> 
                                </a> 
                                <a href="index.php?action=non.php"> 
                                    <img class="bouton" src="img\croix.png" alt="Refuser"> 
                                </a> 
                            </span> -->
                        </div>
                </div>
                <div class="profil-demande_envoye">
                    <span class="profil-demande_th"><?= $nbr_demandes_envoyees ?> Demande<?= (!empty($nbr_demandes_envoyees) && $nbr_demandes_envoyees >= 2) ? 's' : '' ?>
                        d’A<span class="fillacc-amis_titre_rouge">mis</span> envoyée<?= (!empty($nbr_demandes_envoyees) && $nbr_demandes_envoyees >= 2) ? 's' : '' ?>
                    </span>
                        <div class="profil-demande_nom_div">
                        
                            <?php foreach ($demandes_envoyees as $key => $demandes_send) : ?>
                                <span class="profil-demande_nom"><?= ucfirst($demandes_send->futurami) ?></span>
                            <?php endforeach; ?>
                        </div>
                </div>
            </div>
            <?php endif; ?>

            <!--Envoie d'un message -->
            <form action="index.php?action=message" method="POST" enctype="multipart/form-data">
                <textarea class="zone_txt filacc-zone_envoie" name="contenu" id="contenu" placeholder="Quel kinder mangez-vous aujourd’hui ?"></textarea>
    
                <div class="filacc-zone_envoie_bouton">
                    <!-- <input type="file" name="monimage"> -->
                    <a href="index.php?action=addimg">
                        <img class="bouton" src="img\ajout_image.png" alt="Ajouter une image"></a>
                    <input class="bouton" type="submit" name="envoyer" id="bouton-envoyer" value="Envoyer sur le fil d’actualité">
                </div>
            </form>    

            <!--Affichage des post-->
            <?php $__currentLoopData = $postes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="filacc-post">
                <div class="filacc-post-info">
                    <span class="filacc-post_auteur"><?php echo e($poste['login']); ?></span>
                    <span class="filacc-post_date">Posté le : <?php echo e($poste['dateEcrit']); ?></span>
                    <form method="GET" action="">
                        <span type="submit" name="valider" class="filacc-post_supp"> 
                            <a href="index.php?action=delete_message&id=<?= $poste['id'] ?>">
                                <img src="img\poubelle.png" alt="poubelle">Supprimer
                            </a> 
                        </span>
                    </form>
                  <!--<span class="filacc-post_supp"><a href="index.php?action=supprimer"><img src="img\poubelle.png" alt="poubelle">Supprimer</a></span> -->
                </div>
                <div class="filacc-post_titre_contenu">
                    <!--<span class="filacc-post_titre">{$poste['titre']}</span>-->
                    <span class="filacc-post_contenu"><?php echo e($poste['contenu']); ?></span>
                    <span class="filacc-post_img"><img src="" alt="img"></span>
                    <div class="filacc-jaime"><a href="index.php?action=like"><img class='bouton' src="img/jaime.png" alt="J'aime"></a> <span>38</span></div>
            
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!--Affichage des amis-->
        <div class="filacc-flex2">
            <div class="filacc_amis">
                <span class="fillac-amis_titre">A<span class="fillacc-amis_titre_rouge">mis</span></span>

                <div class="filacc-amis_chercher">
                    <input class="zone_txt" id="saisieFiltreAmis" type="texte" placeholder="Chercher un ami">
                    <!--<button class="haut-btn_chercher" type="submit"><img src="img\loupe.png" alt="Rechercher"></button>-->
                </div>

                <ul class="filacc-amis_ul" id="ulFiltreAmis">
                    <?php $__currentLoopData = $mesamis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <li class="filacc-amis_liste">
                                <a href="index.php?action=amis{$_GET['id']}">
                                    <?php if( $_SESSION['id'] !== $pote->idauteur ): ?>
                                        <span class="filacc-amis_nom"><?php echo e($pote->demandeur); ?></span> 
                                        <span class="filacc-amis_groupe"> / <?php echo e($pote->demandeurgenre); ?></span>
                                        <?php else: ?>
                                        <span class="filacc-amis_nom"><?php echo e($pote->ami); ?></span> 
                                        <span class="filacc-amis_groupe"> / <?php echo e($pote->amigenre); ?></span>
                                    <?php endif; ?>
                                    
                                </a>
                                <span class="filacc-ami_status">En ligne <img src="img\en_ligne.png" alt="en ligne"></span>
                            </li>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 </ul>
            </div>
        </div>

    </div>

</div>
    

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>