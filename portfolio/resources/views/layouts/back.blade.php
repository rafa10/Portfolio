<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8" />
	<title>portfolio - @yield('title') </title>
	<!-- import icon font-awesome-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Importmain.css-->
	<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
	{{--import css animate--}}
	{{--<link href="{{asset('css/animate.css')}}" rel="stylesheet">--}}
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<!-- nav -->

<nav class="header">
	<div class="nav-wrapper">
		<a href="{{route('dashboard')}}" class="brand-logo pink-text left">&nbsp;<i class="fa fa-dashboard"></i> Dashboard</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="{{url('/')}}" class="upper"><i class="mdi-av-web"></i></a></li>
			<li><a class='dropdown-button upper' href='#' data-activates='dropdown1'><i class="mdi-action-account-circle"></i></a>
				<!-- Dropdown Structure -->
				<ul id='dropdown1' class='dropdown-content'>
					<li><a class="center" href="{{route('account.profile')}}"><i class="mdi-action-face-unlock"></i>Profile</a></li>
					<li><a class="center" href="{{route('account.settings')}}"><i class="mdi-action-settings"></i>Settings</a></li>
					<li><a class="center" href="{{route('account.change_password')}}"><i class="mdi-action-lock-outline prefix"></i>Password</a></li>
					<li class="divider"></li>
					<li><a class="center" href="{{url('/auth/logout')}}"><i class="mdi-hardware-keyboard-tab"></i>Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>

<br/>
<!--end header-->


<!-- content -->


	<div class="row general">
		{{-- column left menu--}}
		<div id="leftColumn" class="col s3 white">

			{{--<div class="row"><!--form search-->
				<div class="col s12"><br>
					<nav>
						<div class="nav-wrapper">
							{{Form::open(array('url'=> route('search'), 'method' => 'GET'))}}
							<div class="input-field white">
								<input id="search" type="search" name="search" placeholder="Search" required>
								<label for="search"><i class="material-icons black-text ">search</i></label>
								<i class="material-icons">close</i>
							</div>
							{{Form::submit('search')}}
							{{Form::token()}}
							{{Form::close()}}
						</div>
					</nav>
				</div>
			</div>--}}

			<div class="row"><!-- display admin and avatar-->
				<div class="col s12">
					<ul class="collection with-header">
						<li class="collection-item avatar">
							<img src="{{Auth::user()->photo}}" alt="" class="circle">
							<span class="title"><b>{{Auth::user()->name}}&nbsp;{{--Auth::user()->firstname--}}</b></span>
							<p>Administrator</p>
						</li>
						<li class="divider"></li>
					</ul>
				</div>
			</div>


			<div class="row">{{-- left menu dashboard--}}
				<div class="col s12">
					<ul>
						{{--<li class="bold"><a href="{{route('competences.index')}}" class="waves-effect waves-cyan"><i class="fa fa-list"></i>Compétences</a></li>--}}
						<li class="bold"><a href="{{route('competences.index')}}" class="waves-effect waves-cyan"><i class="fa fa-certificate"></i>Compétences</a></li>
						<li class="bold"><a href="{{route('experiences.index')}}" class="waves-effect waves-cyan"><i class="fa fa-laptop"></i>Expériences</a></li>
						<li class="bold"><a href="{{route('formation.index')}}" class="waves-effect waves-cyan"><i class="fa fa-graduation-cap"></i>Formations</a></li>
						<li class="bold"><a href="{{route('langue.index')}}" class="waves-effect waves-cyan"><i class="fa fa-language"></i>Langues</a></li>
						<li class="bold"><a href="{{route('loisier.index')}}" class="waves-effect waves-cyan"><i class="fa fa-heartbeat"></i>Loisiers</a></li>
					</ul>
				</div>
			</div>
		</div>

		{{--column right conten--}}
		<div id="rightColumn" class="col s9">

				@yield('content')

		</div>

	</div>
<!-- end content-->





<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--link file js personnel -->
<script src="{{asset('js/dashboard.js')}}"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>


</body>
</html>