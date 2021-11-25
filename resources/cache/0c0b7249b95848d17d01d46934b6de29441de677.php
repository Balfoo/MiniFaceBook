KindBook
<?php if(isset($_SESSION['info'])): ?>
    <div>
        <strong>Information : </strong> <?php echo e($_SESSION['info']); ?>

    </div>
<?php endif; ?>

<nav>
    <a href="index.php">Accueil</a>

    <a href="index.php?action=profile">Profile</a>

    <a href="index.php?action=page3">Page 3</a>

    <?php if(isset($_SESSION['id'])): ?>
        Bonjour  <?php echo e($_SESSION['login']); ?> <a href='index.php?action=deconnexion'>Deconnexion</a></li>
    <?php else: ?>
        <a href='index.php?action=login'>Login</a>
        <a href='index.php?action=signin'>Inscription</a>
    <?php endif; ?>
</nav>