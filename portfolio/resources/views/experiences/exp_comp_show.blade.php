@extends('layouts.back')

@section('title', 'dashboard')

@section('content')

    @if(Session::has('create'))
        <div class="row">
            <div class="col s12">
                <div id="card-alert" class="card green lighten-5">
                    <div class="card-content green-text center">
                        <p><i class="material-icons">error_outline</i> {{Session::get('create')}}</p>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Session::has('delete'))
        <div class="row">
            <div class="col s12">
                <div id="card-alert" class="card green lighten-5">
                    <div class="card-content green-text center">
                        <p><i class="material-icons">error_outline</i> {{Session::get('delete')}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <h5><i class="fa fa-laptop "></i> Expériences > Compétences > {{$experiences->fonction}}  </h5>

    <table class="centered bordered responsive-table white z-depth-1">
        <thead class="grey lighten-3">
        <tr>
            <th data-field="Id">Competences</th>
            <th data-field="action" colspan="3">Action</th>
        </tr>
        </thead>
        @foreach($query as $item)
            <tbody>
            <tr>
                <td>{{$item->comp_name}}</td>
                <td>
                    <a class="btn-floating btn-large waves-effect waves-light purple" href="{{route('exp_comp.create', $experiences->id)}}"><i class="small material-icons ">add</i></a>
                    <a class="btn-floating btn-large waves-effect waves-light red" href="{{route('exp_comp.destroy', $item->ec_id)}}" onclick="return confirm('Vous etez sur?')"><i class="small material-icons">delete</i></a>
                </td>
            </tr>
            </tbody>
         @endforeach
    </table>

@endsection