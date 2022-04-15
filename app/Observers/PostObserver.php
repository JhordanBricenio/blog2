<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;


class PostObserver
{

    public function creating(Post $post)
    {
      //Evento que se ejecuta antes de crear un nuevo post
      //condicion para que se ejecute si usamos la consola
      if(!App::runningInConsole()) {
        $post->user_id = auth()->user()->id;
      }
     
    }


    public function deleting(Post $post)
    {
        //Observer para eliminar la imagen-- clase la cual es encargada de observar a un modelo
        // y ejecutar una accion cuando se elimina un registro
        if($post->image){
            Storage::delete($post->image->url);
        }
    }


}
