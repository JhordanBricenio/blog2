<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

class PostsIndex extends Component
{
    public function render()
    {
        //Nos retorna el listado de Posts del usuario actualmente autentificado.
        $posts=Post::where('user_id', auth()->user()->id);

        //Pasamos a la vista posts-index
        return view('livewire.admin.posts-index',compact('posts'));
    }
}
