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

            {!!Form::open(array('url' => route('loisier.update', $id) , 'method' => 'post', 'files'=> true)  )!!}

            <div class="row">
                <div class="file-field input-field col s12">
                    <div class="center">
                        <img  id="img" src="{{asset($loisier->image)}}" width="70" height="70" alt="uplode image">
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
                    {!!Form::text('description', $loisier->description, array('id'=>'description'))!!}
                    {!!Form::label('description','Description')!!}
                    @if ($errors->has('name'))
                        <span class="help-block red-text">
                            <strong>{{ $errors->first('description') }}</strong>
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