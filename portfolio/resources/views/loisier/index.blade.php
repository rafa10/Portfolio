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

    <h5><i class="fa fa-heartbeat"></i> Mes Loisiers </h5>

    <table class="centered bordered responsive-table white z-depth-1">
        <thead class="grey lighten-3">
        <tr>
            <th data-field="Id">Id</th>
            <th data-field="name">Image</th>
            <th data-field="name">Description</th>
            <th data-field="action" colspan="3">Action</th>
        </tr>
        </thead>
        @foreach($loisier as $item)
            <tbody>
            <tr>
                <td>{{$item->id}}</td>
                <td><img src="{{$item->image}}" width="70" height="70" alt="image"></td>
                <td>{{$item->description}}</td>
                <td>
                    <a class="btn-floating btn-large waves-effect waves-light green" href="{{route('loisier.create')}}"><i class="small material-icons ">add</i></a>
                    <a class="btn-floating btn-large waves-effect waves-light blue" href="{{route('loisier.edit', $item->id)}}"><i class="small material-icons ">mode_edit</i></a>
                    <a class="btn-floating btn-large waves-effect waves-light red" href="{{route('loisier.destroy', $item->id)}}" onclick="return confirm('Vous etez sur?')"><i class="small material-icons">delete</i></a>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>

@endsection