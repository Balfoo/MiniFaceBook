<?php
$titre="Fil d'actualité";  
?>

@extends('layouts.app')
@section('content')

<div class="filacc-flex_general">
    <div class="contenu filacc-flex1">

        <!--Envoie d'un message -->
        <form action="index.php?action=connexion" method="POST">
            <textarea class="zone_txt filacc-zone_envoie" name="post" id="post" placeholder="Quel kinder mangez-vous aujourd’hui ?"></textarea>

            <div class="filacc-zone_envoie_bouton">
                <a href="index.php?action=addimg"><img class="bouton" src="img\ajout_image.png" alt="Ajouter une image"></a>
                <input class="bouton" type="submit" name="envoyer" id="envoyer" value="Envoyer sur le fil d’actualité">
            </div>
        </form>


        <!--Affichage des post-->
        @foreach($postes as $poste)
        <div class="filacc-post">
            <div class="filacc-post-info">
                <span class="filacc-post_auteur">{{$poste['idAuteur']}}</span>
                <span class="filacc-post_date">Posté le : {{$poste['dateEcrit']}}</span>
                <span class="filacc-post_supp"><a href="index.php?action=supprimer"><img src="img\poubelle.png" alt="poubelle">Supprimer</a></span>
            </div>
            <div class="filacc-post_titre_contenu">
                <span class="filacc-post_titre">{{$poste['titre']}}</span>
                <span class="filacc-post_contenu">{{$poste['contenu']}}</span>
                <span class="filacc-post_img"><img src="img\animal_bizare.jpg" alt="img"></span>
            </div>
        </div>

    </div>

        <!--Affichage des amis-->
    <div class="contenu filacc-flex2">
        <div class="filacc_amis">
            <span class="fillac-amis_titre">A<span class="fillacc-amis_titre_rouge">mis</span></span>

            <div class="filacc-amis_chercher">
                <input class="zone_txt" type="texte" class="form-controle" placeholder="Chercher un amis">
                <button class="haut-btn_chercher" type="submit" class="bts bts-info"><img src="img\loupe.png" alt="Rechercher"></button>
            </div>

            <div class="filacc-amis_liste">
                <a href="index.php?action=amis{$_GET['id']}"><span class="filacc-amis_nom">Dupond</span> <span class="filacc-amis_groupe">/Groupe</span></a>
                <span class="filacc-ami_status">En ligne <img src="img\en_ligne.png" alt="en ligne"></span>
            </div>
        </div>
    </div>
</div>

@endforeach
@endsection