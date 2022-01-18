<?php
$titre="Modfifier Profile";  
?>

@extends('layouts.app')
@section('content')

<div class="signin-contenu">
    <div class="signin-filtre_fond"></div>

    <div class="signin-logo">
        <h1><span class="logo_kinbook">K<span class="logo_kinbook_rouge">indbook</span></span></h1>
        <span>Rejoignez vos amis mangeurs de Kinder !</span>
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

            <label for="genre">KinTeam</label>
            <select class="bouton" name="genre" id="genre">
                <option value="Beuno">Beuno</option>
                <option value="Country">Country</option>
                <option value="Surprise">Surprise</option>
                <option value="Barre">Barre</option>
                <option value="Choco'bon">Choco'bon</option>

            </select>

            <label for="login">Description : </label>
            <input class="zone_txt" type="text" name="description" id="description" required>

            <input class="bouton" type="submit" value="Modifier Profile">
        </form>
    </div>

</div>