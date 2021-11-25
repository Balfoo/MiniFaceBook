<link type="text/css" rel="stylesheet" href="../../assets/style.css">

<?php if(isset($_SESSION['info'])): ?>
    <div>
        <strong>Information : </strong> <?php echo e($_SESSION['info']); ?>

    </div>
<?php endif; ?>

<nav>
    <a href="index.php?action=index">KindBook</a>
    <?php echo $__env->make('partials.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <a href="index.php?action=filsacc">Fils D'acctualité</a>

    <?php if(isset($_SESSION['id'])): ?>
    <a href='index.php?action=profile'><?php echo e($_SESSION['login']); ?> </a> </li>
    <?php else: ?>
        <a href='index.php?action=login'>Login</a>
    <?php endif; ?>
</nav>