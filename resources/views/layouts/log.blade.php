<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KindBook | <?php echo(isset($titre)) ? $titre : ' '; ?></title>
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>
<main class="container">
    @yield("content")
</main>
@include('partials.footer')
</body>
</html>
