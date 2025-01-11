@extends('adminlte::page')

@section('title', 'Blog - Etiquetas')

@section('content_header')
    <h1>Lista de Etiquetas</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-body">

          @if (session('info'))
            <div class="alert alert-success mt-3">
                {{session('info')}}
            </div>
            
        @endif

        <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Crear Etiqueta</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td><span class="badge" style="background-color: {{ $tag->color }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td width="10px">
                            <a href="{{route('admin.tags.edit', $tag)}}" class="btn btn-secondary">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
            </tbody>

        </table>
    </div>

   </div>
@stop

