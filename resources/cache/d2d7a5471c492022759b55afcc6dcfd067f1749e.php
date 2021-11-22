<?php $__env->startSection('content'); ?>
    <p>Ceci est la page de connexion</p>

    <form action="index.php?action=connexion" method="POST">
        <label for="login">Identifiant</label>
        <input type="text" name="login" id="login" required>

        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp" required>

        <label for="resterco">Rester connecté</label>
        <input type="checkbox" name="resterco" id='resterco' value=1>

        <input type="submit" name="envoyer" id="bouton-envoyer" value="Envoyer">
    </form>
    <p> Vous n'est pas encore inscrit, inscrivez-vous ici </p>
    <form name="signin," action="index.php?action=signin" method="Post" style="margin-left: 280px";>
      <input type="submit" value="Inscription">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>