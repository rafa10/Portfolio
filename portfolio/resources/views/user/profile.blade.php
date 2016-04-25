@extends('layouts.back')

@section('title', 'dashboard')

@section('content')

    <div id="profile-page-header" class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="{{asset('img/user-profile-bg.jpg')}}" height="200" alt="user background">
        </div>
        <figure class="card-profile-image">
            <img src="{{$user->photo}}" width="100" height="100" alt="profile image" class="circle z-depth-2 responsive-img activator">
        </figure>
        <div class="card-content">
            <div class="row">
                <div class="col s3 offset-s2">
                    <h4 class="card-title grey-text text-darken-4">{{$user->lastname}}&nbsp;{{$user->firstname}}</h4>
                    <p class="medium-small grey-text">Développeur intégrateur web</p>
                </div>
                <div class="col s2 center-align">
                    <h4 class="card-title grey-text text-darken-4">10+</h4>
                    <p class="medium-small grey-text">Work Experience</p>
                </div>
                <div class="col s2 center-align">
                    <h4 class="card-title grey-text text-darken-4">6</h4>
                    <p class="medium-small grey-text">Completed Projects</p>
                </div>
                <div class="col s2 center-align">
                    <h4 class="card-title grey-text text-darken-4">{{count($competences)}}</h4>
                    <p class="medium-small grey-text">Compétences</p>
                </div>
                <div class="col s1 right-align">
                    <a class="btn-floating activator waves-effect waves-light darken-2 right">
                        <i class="mdi-action-perm-identity"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-reveal">
            <p>
                <span class="card-title grey-text text-darken-4">{{$user->lastname}}&nbsp;{{$user->name}} <i class="mdi-navigation-close right"></i></span>
                <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Développeur intégrateur web</span>
            </p>

            <p>{{$user->address}}</p>

            <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +33 {{$user->phone}}</p>
            <p><i class="mdi-communication-email cyan-text text-darken-2"></i> {{$user->email}}</p>
            <p><i class="mdi-social-cake cyan-text text-darken-2"></i> {{$user->age}}</p>
            <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> {{$user->address}}</p>
        </div>
    </div>

@endsection