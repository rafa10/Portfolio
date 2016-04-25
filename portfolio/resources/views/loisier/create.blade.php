@extends('layouts.back')

@section('title', 'dashboard')

@section('content')

    <div class="row paddingForm">
        <div class="col s6 white z-depth-1">

            <div class="row">
                <div class="input-field col s12">
                    <h5 class="black-text  upper">Loisiers</h5>
                </div>
            </div>

            {!!Form::open(array('url' => route('loisier.store') , 'method' => 'post', 'files'=> true)  )!!}

                <div class="row">
                    <div class="file-field input-field col s12">
                        <div class="hide center">
                            <img class="circle" id="img" src="#" width="70" height="70" alt="uplode image">
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

                <div class="row {{ $errors->has('description') ? ' has-error' : '' }}">
                    <div class="input-field col s12">
                        <i class="mdi-hardware-laptop prefix"></i>
                        {!!Form::text('description', null, array('id'=>'description'))!!}
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