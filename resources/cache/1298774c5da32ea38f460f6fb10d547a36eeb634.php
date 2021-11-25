<<<<<<< HEAD
<?php
$titre="Profile";
?>


<?php $__env->startSection('content'); ?>
    <p>Et voici la page 2</p>
<?php $__env->stopSection(); ?>
=======
<?php
$titre="Profile";
?>
 
<a href='index.php?action=deconnexion'>Deconnexion</a>

<?php $__env->startSection('content'); ?>
    <p>Tu es sur ton profile</p>
<?php $__env->stopSection(); ?>


>>>>>>> 5f9c9e6ead025d60db5f4acfb40425ee3cdd4c5d
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>