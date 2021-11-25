<?php
$titre="Inscription";
?>
@extends('layouts.log')

@section('content')
    <p>Inscrivez-Vous au KindBook</p>

    <form action="index.php?action=inscription" method="POST">
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" required>

        <label for="login">Identifiant : </label>
        <input type="text" name="login" id="login" required>

        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" id="mdp" required>

        <input type="submit" value="Rejoindre l'équipe chocolaté">
    </form>

@endsection