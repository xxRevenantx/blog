<div>
  {{-- <div class="card-header">
    <input wire:model.live="search"  class="form-control" placeholder="Ingrese el nombre de un post">

  </div> --}}


  @if ($posts->count())
      <table id="posts" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>user_id</th>
                <th>category_id</th>
                <th colspan="2"></th>
            </tr>
        </thead>

        <tbody>
            @foreach($posts as $key => $post)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->slug}}</td>
                    <td>{{$post->status}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category->name}}</td>

                    <td width="10px">
                        <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-secondary">Editar</a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
              @endforeach
        </tbody>

    </table> 

  @else
  <div class="alert alert-warning mt-3" role="alert">
    No hay ningun registro
</div>

  @endif

  

   
</div>
