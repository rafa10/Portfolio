@extends('layouts.frant')

@section('title', 'home')

@section('content')

<section id="info" class="info"><!-- info -->
	<div class="card">
		<div class="card-image waves-effect waves-block waves-light">
			<img class="activator" src="img/bg-profile.jpg" width="" height="500">
		</div>
		<div class="card-content">
			<img class="z-depth-1 circle" src="{{$user->photo}}" width="150" height="150" alt="avatar" >
      <span class="card-title activator grey-text text-darken-4">{{$user->name}} {{$user->lastname}}<a class="btn-floating activator waves-effect waves-light darken-2 pink right">
			  <i class="mdi-action-perm-identity"></i>
		  </a>
      </span><br>
			<span class="pink-text">{{$user->title}}</span>
			<!-- <p><a href="#">This is a link</a></p> -->
		</div>
		<div class="card-reveal">
			<span class="card-title grey-text text-darken-4">{{$user->name}} {{$user->lastname}}<i class="material-icons right">close</i></span>
			<span><i class="mdi-action-perm-identity pink-text text-darken-2"></i>{{$user->title}}</span>
			<p><i class="mdi-action-perm-phone-msg pink-text text-darken-2"></i> (+33) {{$user->phone}}</p>
			<p><i class="mdi-communication-email pink-text text-darken-2"></i> {{$user->email}}</p>
			<p><i class="mdi-maps-place pink-text text-darken-2"></i> {{$user->address}}</p>
			<p><i class="mdi-action-description pink-text text-darken-2"></i> {{$user->description}}</p>
		</div>
	</div>
</section>

<!-- le contenu de portfolio-->
<div class="content">

	<section id="competences" class="grey lighten-1 z-depth-1 scrollspy"><!-- competences -->
		<div class="row">
			<div class="col s12 grey  z-depth-1">
				<h3 class="center white-text">Compétences</h3>
			</div>
		</div>

		<div class="row"><!--line one-->
			@foreach($competences as $item)
				<div class="col s12 m2"><!-- col4 mac os -->
					<div class="card">
						<div class="card-image white darken-3">
							<img src="{{$item->logo}}">
						</div>
						<div class="card-content">
							<span >{{$item->name}}</span>
							<p>
								@for($i = 0; $i < $item->rating ; $i++)
									<i class="fa fa-star"></i>
								@endfor
							</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</section><!-- fin -->

	<section id="experiences" class="grey lighten-1 z-depth-1 scrollspy"><!-- experiences -->
		<div class="row">
			<div class="col s12 grey z-depth-1">
				<h3 class="center white-text">Expériences</h3>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<div class="slider"><!-- slide -->
					<ul class="slides z-depth-1">
						@foreach($experiences as $item)
							<li>
								<img src="{{$item->image}}"> <!-- random image -->
								<div class="caption center-align">
									<h3 class=" black-text">{{$item->fonction}}
										<a class="pink-text" href="{{$item->url}}"><i class="small mdi-editor-insert-link"></i></a>
									</h3>
									<h5 class="light grey-text text-darken-3">{{$item->description}}
										<h6><i class=" small mdi-hardware-keyboard"></i><br>{{$item->camp_name}}</h6>.
									</h5>
								</div>
							</li>
						@endforeach
					</ul>
				</div><!-- end slide -->
			</div><!-- </div> -->
		</div>
	</section><!-- fin -->

	<section id="formations" class=" pink lighten-3 z-depth-1 scrollspy"><!-- formation -->
		<div class="row">
			<div class="col s12 pink lighten-1 z-depth-1">
				<h3 class="center white-text ">Formations</h3>
			</div>
		</div>

		<div class="row">
			<div class="col m3 center"><span><i class="large mdi-social-school pink-text"></i></span></div>
			<div class="col m3 center"><span><i class="large mdi-social-school pink-text"></i></span></div>
			<div class="col m3 center"><span><i class="large mdi-social-school pink-text"></i></span></div>
			<div class="col m3 center"><span><i class="large mdi-social-school pink-text"></i></span></div>
		</div>
		<div class="row ">
			@foreach($formation as $item)
				<div class="col s12 m3 "><!-- diplome 3WA -->
					<div class="card-panel center-align pink lighten-1">
						<h4>Diplôme</h4>
						<h5>{{$item->year}}</h5>
						<p>{{$item->description}} <br>({{$item->type}}) </p>
					</div>
				</div>
			@endforeach
		</div><br>
	</section><!-- fin -->

	<section id="centre" class="teal lighten-1 z-depth-1 scrollspy"><!-- section centre d'interet -->
		<div class="row">
			<div class="col s12 teal z-depth-1">
				<h3 class="center  white-text">Centre d'intérêt</h3>
			</div>
		</div>
		<div class="row">
            @foreach($loisier as $item)
				<div class="col s12 m3"><!-- loisier -->
					<div class="card-panel center-align teal lighten-2  center">
						<span><img src="{{$item->image}}"></span>
						<h5>{{$item->description}}</h5>
					</div>
				</div>
			@endforeach
		</div><br>
	</section><!-- fin -->

	<section id="contact" class=" grey  scrollspy"><!-- section contact -->
		<br>
		<div class="row">
			<div class="col s12"><br>
				<!-- <h3 class=" center">Contact</h3> -->
				<div class="row ">
					<div class="col m6 offset-m3 s12 grey lighten-3 z-depth-1"><br><br>

						{!!Form::open(array('url' => route('send.email'), 'method' => 'post'))!!}
							<div class="row">
								<div class="input-field col s12">
									<h3 class="black-text center upper">Contact</h3>
								</div>
							</div>

							@if(Session::has('mail'))
								<div class="row">
									<div class="col s12">
										<div id="card-alert" class="card green lighten-5">
											<div class="card-content green-text center">
												<p><i class="material-icons">error_outline</i> {{Session::get('mail')}}</p>
											</div>
										</div>
									</div>
								</div>
							@endif

							<div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
								<div class="input-field col s12">
									<i class="mdi-action-account-circle prefix"></i>
									{!!Form::text('name', null, array('id'=>'name'))!!}
									{!!Form::label('name','Name')!!}
									@if ($errors->has('name'))
										<span class="help-block red-text">
								<strong><i class="mdi-alert-warning"></i>{{ $errors->first('name') }}</strong>
							</span>
									@endif
								</div>
							</div>

							<div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
								<div class="input-field col s12">
									<i class="mdi-communication-email prefix"></i>
									{!!Form::email('email', null, array('id'=>'email'))!!}
									{!!Form::label('email','Email')!!}
									@if ($errors->has('email'))
										<span class="help-block red-text">
								<strong><i class="mdi-alert-warning"></i>{{ $errors->first('email') }}</strong>
							</span>
									@endif
								</div>
							</div>

							<div class="row {{ $errors->has('subject') ? ' has-error' : '' }}">
								<div class="input-field col s12">
									<i class="mdi-action-subject prefix"></i>
									{!!Form::text('subject', null, array('id'=>'subject'))!!}
									{!!Form::label('subject','Subject')!!}
									@if ($errors->has('subject'))
										<span class="help-block red-text">
								<strong><i class="mdi-alert-warning"></i>{{ $errors->first('subject') }}</strong>
							</span>
									@endif
								</div>
							</div>

							<div class="row {{ $errors->has('message') ? ' has-error' : '' }}">
								<div class="input-field col s12">
									<i class="mdi-action-question-answer prefix"></i>
									{!!Form::textarea('message', null, array('class'=>'materialize-textarea'))!!}
									{!!Form::label('message','Message')!!}
									@if ($errors->has('message'))
										<span class="help-block red-text">
								<strong><i class="mdi-alert-warning"></i>{{ $errors->first('message') }}</strong>
							</span>
									@endif
								</div>
							</div>


							<div class="row">
								<div class="input-field col s12">
									{!!Form::submit('Send', array('class' =>'btn pink waves-effect waves-light right'))!!}
								</div>
							</div>

						{!!Form::token()!!}
						{!!Form::close()!!}
						<br><br>
					</div>
				</div>
			</div>
	</section><!-- fin -->

</div><!--fin contenu-->

@endsection



