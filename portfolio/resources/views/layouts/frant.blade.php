<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8" />
	<title>Portfolio - @yield('title')</title>
	<!-- Import font icon font-awesome-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!--Import Google Icon Font-->
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
	<!-- mon fichier CSS personnaliser-->
	<link rel="stylesheet" type="text/css" href="css/portfolio.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<nav>
	<div class="nav-wrapper deep-purple darken-4">
		<a href="#info" class="brand-logo pink-text">&nbsp;&nbsp;{{$user->name}} {{$user->lastname}}</a>
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down">
			<li><a href="#competences">Compétences</a></li>
			<li><a href="#experiences">Expériences</a></li>
			<li><a href="#formations">Formations</a></li>
			<li><a href="#centre">Centre d'intérêt</a></li>
			<li><a href="#contact">Contacts</a></li>
		</ul>
		<ul class="side-nav" id="mobile-demo">
			<li><a href="#competences">Compétences</a></li>
			<li><a href="#experiences">Expériences</a></li>
			<li><a href="#formations">Formations</a></li>
			<li><a href="#centre">Centre d'intérêt</a></li>
			<li><a href="#contact">Contacts</a></li>
		</ul>
	</div>
</nav>

	@yield('content')

<footer class="page-footer deep-purple darken-1"><!--footer-->
	<!-- <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Footer Content</h5>
          <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div> -->
	<div class="footer-copyright deep-purple darken-2">
		<div class="container">
			© 2016 Copyright - BELKHIRIA NAJIB
			<a class="btn-floating btn-large waves-effect waves-light deep-purple darken-2 right"><i class="fa fa-github"></i></a>
			<a class="btn-floating btn-large waves-effect waves-light deep-purple darken-2 right"><i class="fa fa-facebook"></i></a>
			<a class="btn-floating btn-large waves-effect waves-light deep-purple darken-2 right"><i class="fa fa-viadeo"></i></a>
		</div>
	</div>
</footer>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/portfolio.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

</body>
</html>




