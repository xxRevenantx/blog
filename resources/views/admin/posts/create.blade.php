@extends('adminlte::page')

@section('title', 'Blog - Post')

@section('content_header')
    <h1>Crear nuevo de Post</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-body">
          

            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">

                <input type="hidden" readonly class="form-control" name="user_id" value="{{ auth()->user()->id }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" value="{{ old('name') }}" autocomplete="off" name="name" class="form-control"
                        placeholder="Ingrese el nombre del Post" id="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" value="{{ old('slug') }}" readonly name="slug" class="form-control"
                        placeholder="Ingrese el slug del Post" id="slug">
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="category_id">Categoría</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                    </select>
                    
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <p class="font-weight-bold">Etiquetas</p>
                @foreach ($tags as $tag)
                <label class="mr-3">
                    <input 
                        type="checkbox" 
                        name="tags[]" 
                        value="{{ $tag->id }}" 
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    {{ $tag->name }}
                </label>
            @endforeach
                @error('tags')
                    <br>
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                
                
                
                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label>
                        <input 
                            type="radio" 
                            name="status" 
                            value="1" 
                            {{ old('status') == 1 ? 'checked' : '' }}> BORRADOR
                    </label>
                    <label>
                        <input 
                            type="radio" 
                            name="status" 
                            value="2" 
                            {{ old('status') == 2 ? 'checked' : '' }}> PUBLICADO
                    </label><br>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="row">
                
                    <div class="col-md-6">
                        <div class="image-wrapper">
                            <img id="picture"
                                src=" https://cdn.pixabay.com/photo/2023/12/12/15/36/sea-8445435_960_720.jpg">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group
                            ">
                            <label for="file">Imagen que se mostrará en el post</label>
                            <input type="file" accept="image/*" name="file" id="file" class="form-control">
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                
                </div>
                
                
                
                
                <div class="form-group ">
                    <label for="extract">Extracto</label>
                    <textarea name="extract" id="extract" rows="10" placeholder="Ingresa el extracto del Post" class="form-control">{{ old('extract') }}</textarea>
                    @error('extract')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                
                
                <div class="form-group
                    ">
                    <label for="body">Cuerpo del Post</label>
                    <textarea name="body" id="body" rows="10" placeholder="Ingresa el cuerpo del Post" class="form-control">{{ old('body') }}</textarea>
                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                



                <button type="submit" class="btn btn-primary">Crear Post</button>




            </form>

        </div>

    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop


@section('js')
    <script src="{{ asset('vendor/slugify/slugify.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/hcxfrw0pcqi9p4kan39syjk366xqc5icvijln2ofw6a0l43g/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            slugify.init('#name', {
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>

    <script>
        tinymce.init({
            selector: '#extract',
            plugins: [
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media',
                'searchreplace', 'table', 'visualblocks', 'wordcount',
                'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker',
                'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage',
                'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags',
                'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                'See docs to implement AI Assistant')),

        });
        tinymce.init({
            selector: '#body',
            plugins: [
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media',
                'searchreplace', 'table', 'visualblocks', 'wordcount',
                'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker',
                'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage',
                'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags',
                'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                'See docs to implement AI Assistant')),

        });
    </script>

    <script>
        // Cambiar la imagen

        document.getElementById("file").addEventListener('change', cambiar);

        function cambiar(event) {

            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("picture").setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(file);

        }
    </script>
@endsection
