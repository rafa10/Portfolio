@extends('layouts.back')

@section('title', 'dashboard')

@section('content')

    <div class="row paddingForm">
        <div class="col s6 white z-depth-1">

            <div class="row">
                <div class="input-field col s12">
                    <h5 class="black-text  upper">Langue</h5>
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

            {!!Form::open(array('url' => route('account.update', $user) , 'method' => 'post', 'files'=> true)  )!!}

                <div class="row">
                    <div class="file-field input-field col s12">
                        <div class="center">
                            <img class="circle" id="img" src="{{$user->photo}}" width="70" height="70" alt="uplode image">
                        </div>
                        <div class="btn black">
                            <span>Photo</span>
                            {!!Form::file('photo', array('id'=>'imgInp'))!!}
                        </div>
                        <div class="file-path-wrapper">
                            {!!Form::text('photo', null, array('class' => 'file-path validate'))!!}
                        </div>
                    </div>
                </div>
                <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-action-account-circle prefix"></i>
                        {!!Form::text('name', $user->name, array('id'=>'name'))!!}
                        {!!Form::label('name','Name')!!}
                        @if ($errors->has('name'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row {{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-action-account-circle prefix"></i>
                        {!!Form::text('lastname', $user->lastname, array('id'=>'lastname'))!!}
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
                        {!!Form::date('age', $user->age, array('id'=>'age'))!!}
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
                        {!!Form::textarea('address', $user->address, array('class'=>'materialize-textarea'))!!}
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
                        {!!Form::text('phone', $user->phone, array('id'=>'lastname'))!!}
                        {!!Form::label('phone','Téléphone')!!}
                        @if ($errors->has('phone'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row {{ $errors->has('title') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-action-assignment-ind prefix"></i>
                        {!!Form::text('title', $user->title, array('id'=>'title'))!!}
                        {!!Form::label('title','Titre')!!}
                        @if ($errors->has('title'))
                            <span class="help-block red-text">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="row {{ $errors->has('description') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-content-create prefix"></i>
                        {!!Form::textarea('description', $user->description, array('class'=>'materialize-textarea'))!!}
                        {!!Form::label('description','Description')!!}
                        @if ($errors->has('description'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-communication-email prefix"></i>
                        {!!Form::email('email', $user->email, array('id'=>'email'))!!}
                        {!!Form::label('email','Email')!!}
                        @if ($errors->has('email'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        {!!Form::submit('Register', array('class' =>'btn cyan waves-effect waves-light pink right'))!!}
                    </div>
                </div>

                {!!Form::token()!!}
                {!!Form::close()!!}
        </div>
    </div>

@endsection