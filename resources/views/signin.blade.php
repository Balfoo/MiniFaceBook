<?php
$titre="Inscription";
?>
@extends('layouts.log')

@section('content')

<div class="signin-contenu">
    <div class="signin-filtre_fond"></div>

    <div class="signin-logo">
        <h1><span class="logo_kinbook">K<span class="logo_kinbook_rouge">indbook</span></span></h1>
        <span>Rejoignez vos amis mangeur de Kinder !</span>
    </div>

    <div class="signin-form">
        <p>Inscrivez-Vous au KindBook</p>
        <form class="signin-form_connexion" action="index.php?action=inscription" method="POST">
            <label for="email">Email : </label>
            <input class="zone_txt" type="email" name="email" id="email" required>

            <label for="login">Identifiant : </label>
            <input class="zone_txt" type="text" name="login" id="login" required>

            <label for="mdp">Mot de passe : </label>
            <input class="zone_txt" type="password" name="mdp" id="mdp" required>

            <input class="bouton" type="submit" value="Rejoindre l'équipe chocolaté">
        </form>
    </div>

</div>

@endsection