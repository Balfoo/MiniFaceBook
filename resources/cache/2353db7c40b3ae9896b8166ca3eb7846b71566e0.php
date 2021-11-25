<?php
$titre="Inscription";
?>


<?php $__env->startSection('content'); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.log', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>