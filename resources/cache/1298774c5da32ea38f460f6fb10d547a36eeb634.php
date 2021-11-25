<?php
$titre="Profile";
?>
 
<a href='index.php?action=deconnexion'>Deconnexion</a>

<?php $__env->startSection('content'); ?>
    <p>Tu es sur ton profile</p>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>