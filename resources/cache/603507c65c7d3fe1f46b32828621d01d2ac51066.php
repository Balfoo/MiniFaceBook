<?php $__env->startSection('content'); ?>
    <p>Page d'inscription</p>

    <form action="index.php?action=inscription" method="POST">
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" required>

        <label for="login">Identifiant : </label>
        <input type="text" name="login" id="login" required>

        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" id="mdp" required>

        <input type="submit" value="S'inscrire">
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>