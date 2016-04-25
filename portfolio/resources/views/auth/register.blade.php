@extends('layouts.app')

@section('title', 'register')

@section('content')

	<div class="row "><br><br><br><br><br>
		<div class="col s4 offset-s4">
			<div class="card-panel">
				{{--<p class="center"><img src="{{asset('img/cinema-pink.png')}}" width="70" height="70" alt="logo"></p>--}}
				<h5 class="header2 upper center">Register</h5>
				<div class="row">
					{!!Form::open(array('url' => '/auth/register' , 'method' => 'post', 'files'=> true)  )!!}

					<!--<div class="row">
						<div class="file-field input-field col s12">
							<div class="hide center">
								<img class="circle" id="img" src="#" width="70" height="70" alt="uplode image">
							</div>
							<div class="btn black">
								<span>Photo</span>
								{!!Form::file('photo', array('id'=>'imgInp'))!!}
							</div>
							<div class="file-path-wrapper">
								{!!Form::text('photo', null, array('class' => 'file-path validate'))!!}
							</div>
						</div>
					</div>-->
					<div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-action-account-circle prefix"></i>
							{!!Form::text('name', null, array('id'=>'name'))!!}
							{!!Form::label('name','Name')!!}
							@if ($errors->has('name'))
								<span class="help-block red-text">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
							@endif
						</div>
					</div>
					<!--<div class="row {{ $errors->has('lastname') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-action-account-circle prefix"></i>
							{!!Form::text('lastname', null, array('id'=>'lastname'))!!}
							{!!Form::label('lastname','Lastname')!!}
							@if ($errors->has('lastname'))
								<span class="help-block red-text">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
							@endif
						</div>
					</div>
					<div class="row {{ $errors->has('age') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-editor-insert-invitation prefix"></i>
							{!!Form::label('age','Date de Naissance')!!}
							{!!Form::date('age', null, array('id'=>'age'))!!}
							@if ($errors->has('age'))
								<span class="help-block red-text">
                                <strong>{{ $errors->first('age') }}</strong>
                            </span>
							@endif
						</div>
					</div>
					<div class="row {{ $errors->has('address') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-maps-place prefix"></i>
							{!!Form::textarea('address', null, array('class'=>'materialize-textarea'))!!}
							{!!Form::label('address','Adresse')!!}
							@if ($errors->has('address'))
								<span class="help-block red-text">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
							@endif
						</div>
					</div>
					<div class="row {{ $errors->has('phone') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-notification-phone-in-talk prefix"></i>
							{!!Form::text('phone', null, array('id'=>'lastname'))!!}
							{!!Form::label('phone','Téléphone')!!}
							@if ($errors->has('phone'))
								<span class="help-block red-text">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
							@endif
						</div>
					</div>-->
					<div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-communication-email prefix"></i>
							{!!Form::email('email', null, array('id'=>'email'))!!}
							{!!Form::label('email','Email')!!}
							@if ($errors->has('email'))
								<span class="help-block red-text">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
							@endif
						</div>
					</div>
					<div class="row {{ $errors->has('password') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-action-lock-outline prefix"></i>
							{!!Form::password('password', null, array('id' => 'password'))!!}
							{!!Form::label('password', 'Password')!!}
							@if ($errors->has('password'))
								<span class="help-block red-text">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
							@endif
						</div>
					</div>
					<div class="row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-action-lock-outline prefix"></i>
							{!!Form::password('password_confirmation', null, array('id' => 'password_confirmation'))!!}
							{!!Form::label('password_confirmation', 'Confirm Password')!!}
							@if ($errors->has('password_confirmation'))
								<span class="help-block red-text">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
							@endif
						</div>
					</div>


					<div class="row">
						<div class="input-field col s12">
							{!!Form::submit('Register', array('class' =>'btn cyan waves-effect waves-light right'))!!}
						</div>
					</div>

					{!!Form::token()!!}
					{!!Form::close()!!}
				</div>
			</div>

		</div>
	</div>

@endsection