@extends('layouts.back')

@section('title', 'dashboard')

@section('content')

    <div class="row paddingForm">
        <div class="col s6 white z-depth-1">

            <div class="row">
                <div class="input-field col s12">
                    <h5 class="black-text  upper">Compétences</h5>
                </div>
            </div>

                    {!!Form::open(array('url' => route('competences.store') , 'method' => 'post', 'files'=> true)  )!!}

                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="hide center">
                                <img class="circle" id="img" src="#" width="70" height="70" alt="uplode image">
                            </div>
                            <div class="btn black">
                                <span>Photo</span>
                                {!!Form::file('logo', array('id'=>'imgInp'))!!}
                            </div>
                            <div class="file-path-wrapper">
                                {!!Form::text('logo', null, array('class' => 'file-path validate'))!!}
                            </div>
                            @if ($errors->has('logo'))
                                <span class="help-block red-text">
                                    <strong>{{ $errors->first('logo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="input-field col s12">
                            <i class="mdi-hardware-laptop prefix"></i>
                            {!!Form::text('name', null, array('id'=>'name'))!!}
                            {!!Form::label('name','Nom')!!}
                            @if ($errors->has('name'))
                                <span class="help-block red-text">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row {{ $errors->has('rating') ? ' has-error' : '' }}">
                        <div class="input-field col s12">
                            <p class="range-field">
                                {!!Form::selectRange('rating',0 ,5, array('id' => 'rating'))!!}
                                {!!Form::label('rating','Evolution entre 0 et 5')!!}
                            </p>
                            @if ($errors->has('rating'))
                                <span class="help-block red-text">
                                    <strong>{{ $errors->first('rating') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>



                    <div class="row">
                        <div class="input-field col s12">
                            {!!Form::submit('Envoyer', array('class' =>'btn cyan waves-effect waves-light right'))!!}
                            {{--<i class="mdi-content-send right"></i>--}}
                            </button>
                        </div>
                    </div>

                    {!!Form::token()!!}
                    {!!Form::close()!!}
        </div>
    </div>

@endsection