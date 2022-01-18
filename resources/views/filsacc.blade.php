<?php
$titre="Fil d'actualité";  
?>

@extends('layouts.app')
@section('content')

<div class="filacc-flex_general contenu">
    <div class="filacc-flex1">

        <!--Envoie d'un message -->
        <form action="index.php?action=message" method="POST">
            <textarea class="zone_txt filacc-zone_envoie" name="contenu" id="contenu" placeholder="Quel kinder mangez-vous aujourd’hui ?"></textarea>

            <div class="filacc-zone_envoie_bouton">
                <a href="index.php?action=addimg"><img class="bouton" src="img\ajout_image.png" alt="Ajouter une image"></a>
                <input class="bouton" type="submit" name="envoyer" id="bouton-envoyer" value="Envoyer sur le fil d’actualité">
            </div>
        </form>


        <!--Affichage des post-->
        <?php //var_dump($postes); ?>
            @foreach($postes as $poste)
            <div class="filacc-post">
                <div class="filacc-post-info">
                    <span class="filacc-post_auteur">{{$poste['login']}}</span>
                    <span class="filacc-post_date">Posté le : {{$poste['dateEcrit']}}</span>
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
                    <span class="filacc-post_contenu">{{$poste['contenu']}}</span>
                    <span class="filacc-post_img"><img src="" alt="img"></span>
                    <div class="filacc-jaime"><a href="index.php?action=like"><img class='bouton' src="img/jaime.png" alt="J'aime"></a> <span>38</span></div>
            
                </div>
            </div>
            @endforeach
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
                    @foreach($mesamis as $pote)
                        
                            <li class="filacc-amis_liste">
                                <a href="index.php?action=amis{$_GET['id']}">
                                    @if( $_SESSION['id'] !== $pote->idauteur )
                                        <span class="filacc-amis_nom">{{$pote->demandeur}}</span> 
                                        <span class="filacc-amis_groupe"> / {{$pote->demandeurgenre}}</span>
                                        @else
                                        <span class="filacc-amis_nom">{{$pote->ami}}</span> 
                                        <span class="filacc-amis_groupe"> / {{$pote->amigenre}}</span>
                                    @endif
                                    
                                </a>
                                <span class="filacc-ami_status">En ligne <img src="img\en_ligne.png" alt="en ligne"></span>
                            </li>
                        
                    @endforeach

                 </ul>
            </div>
        </div>
</div>

@endsection