@extends('layouts.app')

@section('content')

	<div class="row "><br><br><br><br><br>
		<div class="col s4 offset-s4">
			<div class="card-panel">
				{{--<p class="center"><img src="{{asset('img/cinema-pink.png')}}" width="70" height="70" alt="logo"></p>--}}
				<h5 class="header2 upper center">Reset Password</h5>
				<div class="row">
					{!!Form::open(array('url' => '/password/reset' , 'method' => 'post')  )!!}

					<input type="hidden" name="token" value="{{ $token }}">

					<div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-action-account-circle prefix"></i>
							{!!Form::email('email', $email, array('id'=>'email'))!!}
							{!!Form::label('email','E-Mail Address')!!}
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
							{!!Form::password('password', null, array('id' => 'password3'))!!}
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
							{!!Form::password('password_confirmation', null, array('id' => 'password3'))!!}
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
							{!!Form::submit('Reset Password', array('class' =>'btn cyan waves-effect waves-light right'))!!}
						</div>
					</div>

					{{--{{Form::token()}}--}}{!! csrf_field() !!}
					{!!Form::close()!!}
				</div>
			</div>

		</div>
	</div>
	{{ dump($errors) }}



@endsection

{{--@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Reset Password
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
--}}