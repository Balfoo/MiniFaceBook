<?php
$titre="Login";
?>
@extends('layouts.log')

@section('content')

<div class="login-fond">

    <div class="login-logo">
        <h1><span class="logo_kinbook">K<span class="logo_kinbook_rouge">indbook</span></span></h1>
    </div>

    <form action="index.php?action=connexion" method="POST">
        <label for="login">Identifiant</label>
        <input type="text" name="login" id="login" required>

        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp" required>

        <label for="resterco">Rester connecté</label>
        <input type="checkbox" name="resterco" id='resterco' value=1>

        <input type="submit" name="envoyer" id="bouton-envoyer" value="Envoyer">
    </form>
    <a>Vous n'est pas encore inscrit, inscrivez-vous <a href='index.php?action=signin'>ici</a></a>
</div>

@endsection