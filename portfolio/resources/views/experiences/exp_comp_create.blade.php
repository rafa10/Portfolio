@extends('layouts.back')

@section('title', 'dashboard')

@section('content')

    <div class="row paddingForm">
        <div class="col s6 white z-depth-1">

            <div class="row">
                <div class="input-field col s12">
                    <h5 class="black-text  upper">Competences: <br>{{$experiences->fonction}} </h5>
                </div>
            </div>

            {!!Form::open(array('url' => route('exp_comp.store') , 'method' => 'post'))!!}

                <div class="row hide {{ $errors->has('experiences_id') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-hardware-laptop prefix"></i>
                        {!!Form::text('experiences_id', $experiences->id, array('id'=>'experiences_id'))!!}
                        {!!Form::label('experiences_id','Expériences')!!}
                        @if ($errors->has('experiences_id'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('experiences_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row {{ $errors->has('competences_id') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        {{--<i class="mdi-communication-business prefix"></i>--}}
                        {!!Form::select('competences_id', $tab, array('id'=>'competences_id'))!!}
                        {!!Form::label('competences_id','Compétences')!!}
                        @if ($errors->has('competences_id'))
                            <span class="help-block red-text">
                                <strong>{{ $errors->first('competences_id') }}</strong>
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