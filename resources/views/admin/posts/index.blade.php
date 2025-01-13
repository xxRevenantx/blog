@extends('adminlte::page')

@section('title', 'Blog - Post')

@section('content_header')
    <h1>Lista de Post</h1>
@stop


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.bootstrap4.css">

@endsection

@section('content')
   <div class="card">
    <div class="card-body">

        @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
        @endif

    <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-3">Crear Post</a>

        @livewire('admin.post-index')
    </div>

   </div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>



<script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.bootstrap4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.colVis.min.js"></script>


<script>
new DataTable('#posts', {
    layout: {
        topStart: {
            buttons: [{
                extend: 'pdf',
                text: 'Exportar PDF',
                download: 'open',
                exportOptions: {
                    columns: [2, ':visible']
                    }


            }, {
                extend: 'excel',
                text: 'Exportar Excel',
                autoFilter: true,
                sheetName: 'Blog Post'

            }, {
                extend: 'print',
                text: 'Imprimir'
            }, {
                extend: 'colvis',
                text: 'Columnas Visibles'
            }],

        }
    },

    responsive: true,
    autoWidth: false,
    "language": {
                    "lengthMenu": "Mostrar _MENU_ posts por página",
                    "zeroRecords": "No se encuentran posts",
                    // "info": "Página _PAGE_ de _PAGES_",
                    "info":" _TOTAL_ posts totales",
                    "infoEmpty": "No hay posts",
                    "search":         "Buscar Post:",
                    
                    "infoFiltered": "(filtrado de un total de _MAX_ posts )",
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                },
                
});



</script>

@endsection
