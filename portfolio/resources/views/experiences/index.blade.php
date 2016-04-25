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

    <h5><i class="fa fa-laptop "></i> Mes Expériences </h5>

    <table class="centered bordered responsive-table white z-depth-1">
        <thead class="grey lighten-3">
        <tr>
            <th data-field="Id">Id</th>
            <th data-field="logo">image</th>
            <th data-field="name">Fonction</th>
            <th data-field="name">Entreprise</th>
            <th data-field="name">Début</th>
            <th data-field="name">Fin</th>
            <th data-field="evolution">Description</th>
            <th data-field="name">Url</th>
            <th data-field="competences">Compétences</th>
            <th data-field="action" colspan="3">Action</th>
        </tr>
        </thead>
        @foreach($experiences as $item)
            <tbody>
            <tr>
                <td>{{$item->id}}</td>
                <td><img src="{{$item->image}}" width=80" height="80"></td>
                <td>{{$item->fonction}}</td>
                <td>{{$item->business}}</td>
                <td>{{$item->date_start}}</td>
                <td>{{$item->date_end}}</td>
                <td>{{\Illuminate\Support\Str::limit($item->description,10)}}</td>
                <td>{{\Illuminate\Support\Str::limit($item->url,10)}}</td>
                <td>
                    <a class="btn-floating btn-large waves-effect waves-light purple" href="{{route('exp_comp.create', $item->id)}}"><i class="small material-icons ">add</i></a>
                    <a class="btn-floating btn-large waves-effect waves-light purple" href="{{route('exp_comp.show', $item->id)}}"><i class="small mdi-action-visibility "></i></a>
                </td>
                <td>
                    <a class="btn-floating btn-large waves-effect waves-light green" href="{{route('experiences.create')}}"><i class="small material-icons ">add</i></a>
                    <a class="btn-floating btn-large waves-effect waves-light blue" href="{{route('experiences.edit', $item->id)}}"><i class="small material-icons ">mode_edit</i></a>
                    <a class="btn-floating btn-large waves-effect waves-light red" href="{{route('experiences.destroy', $item->id)}}" onclick="return confirm('Vous etez sur?')"><i class="small material-icons">delete</i></a>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>

@endsection