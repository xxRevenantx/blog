@extends('adminlte::page')

@section('title', 'Editar Categorías')

@section('content_header')
    <h1>Editar categoría</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Atrás</a>
       

        <form action="{{route('admin.categories.update', $category)}}" method="POST">
            


            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name', $category->name)}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="form-group">
               <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" readonly class="form-control" value="{{old('slug', $category->slug)}}">
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>

</div>
    </div>
@stop

@section('js')
    {{-- <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"> </script> --}}



    <script>
        function stringToSlug(text) {

            return text

                .toLowerCase()

                .replace(/ /g, '-')

                .replace(/[^\w-]+/g, '');
        }

        document.addEventListener("DOMContentLoaded", function() {

            const nameInput = document.getElementById("name");

            const slugInput = document.getElementById("slug");

            nameInput.addEventListener("input", function() {

                const slug = stringToSlug(nameInput.value);

                slugInput.value = slug;

            });

        });


        $(document).ready(function() {

            $("#name").stringToSlug({

                setEvents: 'keyup keydown blur',

                getPut: '#slug',

                space: '-'

            });

        });
    </script>
@stop
