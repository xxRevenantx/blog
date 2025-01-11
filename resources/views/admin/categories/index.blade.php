@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1>Lista de Categorías</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-body">

          @if (session('info'))
            <div class="alert alert-success mt-3">
                {{session('info')}}
            </div>
            
        @endif

        <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Crear Categoría</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td width="10px">
                            <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-secondary">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
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

