@isset($_SESSION['info'])
    <div>
        <strong>Information : </strong> {{$_SESSION['info']}}
    </div>
@endisset

<header>
    <nav class="haut-nav">
        <div class="haut-logo_recherche">
            <li class="haut-logo"><h1><a href="index.php?action=index"><span class="logo_kinbook">K<span class="logo_kinbook_rouge">indBook</span></span></a></h1></li>
            <li>@include('partials.search')</li>
        </div>
        <li class="haut-fil_actu"><a href="index.php?action=filsacc"><img src="img\livre.png" alt="livre"><span>Fil d'actualité</span> </a></li>
        <li class="haut-nom-utilisateur"><a href='index.php?action=profile'><img src="img\utilisateur.png" alt="utilisateur"><span>Nom d'utilisateur <!--{{$_SESSION['login']}}--> </span> </a></li>
        <div class="haut-statut_deco">
            <li class="haut-statut"><a href="index.php?action=statut"> Statut : En ligne <img src="img\en_ligne.png" alt="En ligne"></a></li>
            <li class="haut-deco"><a href="index.php?action=deconnexion">Déconnexion <img src="img\deconnexion.png" alt="déconnexion"></a> </li>
        </div>
    </nav>
</header>