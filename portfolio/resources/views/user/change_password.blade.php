@extends('layouts.back')

@section('title', 'dashboard')

@section('content')


    <div class="row paddingForm">
        <div class="col s6 white z-depth-1">

            {!!Form::open(array('url' => route('account.update_password', $user) , 'method' => 'post')  )!!}

            <div class="row">
                <div class="input-field col s12">
                    <h4 class="header2 black-text center upper">Change password</h4>
                </div>
            </div>

            @if(Session::has('update'))
                <div class="row">
                    <div class="col s12">
                        <div class="card green lighten-4 ">
                            <div class="card-content black-text center">
                                <i class="material-icons">info_outline</i><br>
                                <span>{{ Session::get('update') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <div class="row {{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    {!!Form::password('password', null, array('id' => 'password'))!!}
                    {!!Form::label('password', 'Password',array('data-errors'=>'wrong', 'data-success'=>'right'))!!}
                    @if ($errors->has('password'))
                        <span class="help-block red-text">
                            <strong><i class="mdi-alert-warning"></i> {{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    {!!Form::password('password_confirmation', null, array('id' => 'password_confirmation'))!!}
                    {!!Form::label('password_confirmation', 'Confirm Password')!!}
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12">
                    {!!Form::submit('Register', array('class' =>'btn pink waves-effect waves-light right'))!!}
                </div>
            </div>

            {!!Form::token()!!}
            {!!Form::close()!!}
        </div>
    </div>

@endsection