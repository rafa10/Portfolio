@extends('layouts.back')

@section('title', 'dashboard')

@section('content')

    <div class="row">{{-- row content--}}

        <div class="col s12 m6 l3">{{-- stats competences--}}
            <div class="card center">
                <div class="card-content green lighten-1 white-text">
                    <p class="card-stats-title"><i class="fa fa-certificate fa-3x"></i></p>
                    <h4 class="card-stats-number">{{count($competences)}}</h4>
                    <p class="card-stats-compare"><span class="deep-purple-text text-lighten-5">Compétences</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l3">{{-- stats experiences --}}
            <div class="card center">
                <div class="card-content pink lighten-1 white-text">
                    <p class="card-stats-title"><i class="fa fa-laptop fa-3x"></i></p>
                    <h4 class="card-stats-number">{{ count($experiences) }}</h4>
                    <p class="card-stats-compare"><span class="deep-purple-text text-lighten-5">Expériences</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l3">{{-- stats formation --}}
            <div class="card center">
                <div class="card-content cyan lighten-1 white-text">
                    <p class="card-stats-title"><i class="fa fa-graduation-cap fa-3x"></i></p>
                    <h4 class="card-stats-number">{{ count($formation) }} </h4>
                    <p class="card-stats-compare"><span class="deep-purple-text text-lighten-5">Formations</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l3">{{-- stats user --}}
            <div class="card center">
                <div class="card-content purple lighten-1 white-text">
                    <p class="card-stats-title"><i class="fa fa-language fa-3x"></i></p>
                    <h4 class="card-stats-number">{{count($langue)}}</h4>
                    <p class="card-stats-compare"><span class="deep-purple-text text-lighten-5">Langues</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l3">{{-- stats loisier --}}
            <div class="card center">
                <div class="card-content orange lighten-1 white-text">
                    <p class="card-stats-title"><i class="fa fa-heartbeat fa-3x"></i></p>
                    <h4 class="card-stats-number">{{ count($loisier) }}</h4>
                    <p class="card-stats-compare"><span class="deep-purple-text text-lighten-5">Loisiers</span>
                    </p>
                </div>
            </div>
        </div>

    </div>





@endsection