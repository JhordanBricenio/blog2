<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un Post">
    </div>
    @if ($posts->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$posts->id}}</td>
                        <td>{{$posts->name}}</td>
                        <td with="10px">
                            {{-- creamos la rita para editar el post y le enviamos el objeto que necesita esta ruta --}}                        
                            <a class="btn btn-primary btn-sm"href="{{route('admin.posts.edit',$post)}}">Editar</a>
                        </td>
                        <td with="10px">
                            <form action="{{route('admin.posts.destry',$post)}}" method="POST"></form>
                            {{-- Utilizamos la directiva de Blade ya que el metodo delete no existe --}}
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </td>

                    </tr>
                    
                @endforeach
            </tbody>


        </table>

    </div>
    <div class="card-footer">
       {{--  Incluir paginacion desde el componenete de livewire --}}
       {{--  {{$posts->links()}} --}}
    </div>
        
    @else
       <div class="card-body">
            <strong>No hay ninún registro</strong>
       </div>
    @endif
    
</div>
