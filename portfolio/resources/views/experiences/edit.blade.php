@extends('layouts.back')

@section('title', 'dashboard')

@section('content')

    <div class="row paddingForm">
        <div class="col s6 white z-depth-1">

            <div class="row">
                <div class="input-field col s12">
                    <h5 class="black-text  upper">Expériences</h5>
                </div>
            </div>

            @if(Session::has('update'))
                <div class="row">
                    <div class="col s12">
                        <div id="card-alert" class="card green lighten-5">
                            <div class="card-content green-text center">
                                <p><i class="material-icons">error_outline</i> {{Session::get('update')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {!!Form::open(array('url' => route('experiences.update', $id) , 'method' => 'post', 'files'=> true)  )!!}

                <div class="row">
                    <div class="file-field input-field col s12">
                        <div class="center">
                            <img  id="img" src="{{asset($experiences->image)}}" width="100" height="70" alt="uplode image">
                        </div>
                        <div class="btn black">
                            <span>Photo</span>
                            {!!Form::file('image', array('id'=>'imgInp'))!!}
                        </div>
                        <div class="file-path-wrapper">
                            {!!Form::text('image', null, array('class' => 'file-path validate'))!!}
                        </div>
                        @if ($errors->has('image'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('fonction') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-hardware-laptop prefix"></i>
                        {!!Form::text('fonction', $experiences->fonction, array('id'=>'fonction'))!!}
                        {!!Form::label('fonction','Fonction')!!}
                        @if ($errors->has('fonction'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('fonction') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('business') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-communication-business prefix"></i>
                        {!!Form::text('business', $experiences->business, array('id'=>'business'))!!}
                        {!!Form::label('business','Entreprise')!!}
                        @if ($errors->has('business'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('business') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('date_start') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-editor-insert-invitation prefix"></i>
                        {!!Form::label('date_start','Date de début')!!}
                        {!!Form::date('date_start', $experiences->date_start, array('id'=>'date_start'))!!}
                        @if ($errors->has('date_start'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('date_start') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('date_end') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-editor-insert-invitation prefix"></i>
                        {!!Form::label('date_end','Date de fin')!!}
                        {!!Form::date('date_end', $experiences->date_end, array('id'=>'date_end'))!!}
                        @if ($errors->has('date_end'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('date_end') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('description') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-action-question-answer prefix"></i>
                        {!!Form::textarea('description', $experiences->description, array('id'=>'description', 'class' => 'materialize-textarea'))!!}
                        {!!Form::label('description','Description')!!}
                        @if ($errors->has('description'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

            <div class="row {{ $errors->has('url') ? ' has-error' : '' }}">
                <div class="input-field col s12">
                    <i class="mdi-editor-insert-link prefix"></i>
                    {!!Form::text('url', $experiences->url, array('id'=>'url'))!!}
                    {!!Form::label('url','Lien')!!}
                    @if ($errors->has('date_start'))
                        <span class="help-block red-text">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

                <div class="row">
                    <div class="input-field col s12">
                        {!!Form::submit('Envoyer', array('class' =>'btn cyan waves-effect waves-light right'))!!}
                    </div>
                </div>

            {!!Form::token()!!}
            {!!Form::close()!!}
        </div>
    </div>

@endsection