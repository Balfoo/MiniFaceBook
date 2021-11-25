<?php
$titre="Login";
?>
@extends('layouts.log')

@section('content')
    <p>Bienvenu sur la votre KindBook</p>

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
@endsection