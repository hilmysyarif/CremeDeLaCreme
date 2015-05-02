<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $page['title'] }}</title>
    <meta name="description" content="{{ $page['description'] }}">
    <meta name="author" content="Web L'Agence">
    <meta name="keywords" content="{{ $page['keywords']}}">
    <meta property="og:title" content="{{ $page['seo_title']}}" />
    <meta property="og:description" content="{{ $page['seo_description'] }}" />
    <meta property="og:image" content="http://cremedelacreme.io/seo_img.png">
    <meta property="og:image:secure_url" content="https://cremedelacreme.io/seo_img.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:type" content="{{ $page['seo_type']}}" />
    <link rel="icon" href="http://cremedelacreme.io/icon.png" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ranga:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,900,900italic,700italic,700,500italic,500,300italic,400italic,300,100italic,100' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header>
	<div class="container">
		<h1 class="logo">Crème de la Crème</h1>		
	</div>
</header>
@yield('content')
<footer>
	<div class="container">
		<ul class="menu">
			<li><a href="mailto:hello@cremedelacreme.io">Contact</a></li>
			<li><a href="{{ url('jobs') }}">Recrutement</a></li>
			<li><a href="{{ url('conditions-generales') }}">Conditions Générales</a></li>
			<li><a href="mailto:hello@cremedelacreme.io">Relations Presse</a></li>
		</ul>
	</div>
</footer>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-61816012-1', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
</script>
</body>
</html>