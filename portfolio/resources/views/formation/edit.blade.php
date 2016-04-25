@extends('layouts.back')

@section('title', 'dashboard')

@section('content')

    <div class="row paddingForm">
        <div class="col s6 white z-depth-1">

            <div class="row">
                <div class="input-field col s12">
                    <h5 class="black-text  upper">Formations</h5>
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

            {!!Form::open(array('url' => route('formation.update', $id) , 'method' => 'post')  )!!}

            <div class="row {{ $errors->has('type') ? ' has-error' : '' }}">
                <div class="input-field col s12">
                    <i class="mdi-action-stars prefix"></i>
                    {!!Form::text('type', $formation->type, array('id'=>'type'))!!}
                    {!!Form::label('type','Etablissment')!!}
                    @if ($errors->has('type'))
                        <span class="help-block red-text">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="row {{ $errors->has('description') ? ' has-error' : '' }}">
                <div class="input-field col s12">
                    <i class="mdi-action-question-answer prefix"></i>
                    {!!Form::textarea('description', $formation->description, array('id'=>'description', 'class' => 'materialize-textarea'))!!}
                    {!!Form::label('description','Description')!!}
                    @if ($errors->has('description'))
                        <span class="help-block red-text">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="row {{ $errors->has('year') ? ' has-error' : '' }}">
                <div class="input-field col s12">
                    <i class="mdi-editor-insert-invitation prefix"></i>
                    {!!Form::text('year', $formation->year, array('id'=>'year'))!!}
                    {!!Form::label('year','Année')!!}
                    @if ($errors->has('year'))
                        <span class="help-block red-text">
                            <strong>{{ $errors->first('year') }}</strong>
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