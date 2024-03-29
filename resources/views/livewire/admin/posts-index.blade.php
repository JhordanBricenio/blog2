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
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td with="10px">
                                {{-- creamos la rita para editar el post y le enviamos el objeto que necesita esta ruta --}}                        
                                <a class="btn btn-primary btn-sm"href="{{route('admin.posts.edit',$post)}}">Editar</a>
                            </td>
                            <td with="10px">
                                <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
                                    {{-- Utilizamos la directiva de Blade ya que el metodo delete no existe --}}
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>

                        </tr>
                        
                    @endforeach
                </tbody>


            </table>

        </div>
        <div class="card-footer">
        {{--  Incluir paginacion desde el componenete de livewire --}}
            {{$posts->links()}} 
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún Registro</strong>
        </div>
    @endif
    
</div>














