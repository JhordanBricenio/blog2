<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    /* Usamos los estilos de boostrap */
    protected $paginationTheme="bootstrap";

   /*  Variable para escuchar desde la vista de este ccomponnente */
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        //Nos retorna el listado de Posts del usuario actualmente autentificado.
        //->paginate()
        $posts=Post::where('status',2)
                    ->where('name','LIKE','%'.$this->search. '%')
                    ->latest('id')
                    ->paginate(8);

        /*$posts=Post::where('user_id',auth()->id())
                    ->where('name','LIKE','%'.$this->search. '%')//En caso de que haya texto adelante y atras del que estamos buscando
                    ->latest('id');*/

        //Pasamos a la vista posts-index
        return view('livewire.admin.posts-index',compact('posts'));
    }
}
