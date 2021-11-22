<?php
$titre="Accueil";
?>

<?php $__env->startSection('content'); ?>
    <p>bonjour, me voici sur la page principale du site</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>