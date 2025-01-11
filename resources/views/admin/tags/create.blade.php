@extends('adminlte::page')

@section('title', 'Blog | Crear etiqueta')

@section('content_header')
    <h1>Crear etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.tags.index') }}" class="btn btn-primary">Atrás</a>
            <form action="{{ route('admin.tags.store') }}" method="POST">

              

                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" placeholder="Etiqueta" name="name" id="name" class="form-control"
                        value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" placeholder="Ingrese el slug de la etiqueta" name="slug" id="slug" readonly class="form-control"
                        value="{{ old('slug') }}">
                        @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="color">Color de la etiqueta</label>
                    <input type="color" name="color" id="color" class="form-control"
                        value="{{ old('color') }}">

                        @error('color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
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
