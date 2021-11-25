
@isset($_SESSION['info'])
    <div>
        <strong>Information : </strong> {{$_SESSION['info']}}
    </div>
@endisset

<nav>
    <a href="index.php?action=index">KindBook</a>
    @include('partials.search')
    <a href="index.php?action=filsacc">Fils D'acctualité</a>

    @isset($_SESSION['id'])
    <a href='index.php?action=profile'>{{$_SESSION['login']}} </a> </li>
    @else
        <a href='index.php?action=login'>Login</a>
    @endif
</nav>