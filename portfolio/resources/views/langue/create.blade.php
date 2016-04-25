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

            {!!Form::open(array('url' => route('langue.store') , 'method' => 'post'))!!}

            <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="input-field col s12">
                    <i class="mdi-action-language prefix"></i>
                    {!!Form::text('name', null, array('id'=>'name'))!!}
                    {!!Form::label('name','Nom')!!}
                    @if ($errors->has('name'))
                        <span class="help-block red-text">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="row {{ $errors->has('description') ? ' has-error' : '' }}">
                <div class="input-field col s12">

                    {!!Form::select('description', array( ''                 => 'Choissiez',
                                                          'courant'          => 'Courant',
                                                          'conversationnel'  => 'Conversationnel',
                                                          'langue_maternelle'=> 'Langue maternelle'), array('id'=>'description'))!!}
                    {!!Form::label('description','Description')!!}
                    @if ($errors->has('description'))
                        <span class="help-block red-text">
                                <strong>{{ $errors->first('description') }}</strong>
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