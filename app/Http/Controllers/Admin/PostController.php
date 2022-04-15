<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{


    protected $paginationTheme="bootstrap"; 

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function index()
    {  
         
        return view('admin.posts.index');
    }

    public function create()
    {
       /*  Obteniendo el formato para pasarle a laravel colective obteniendo el nombre y como llave pasarle el id */
        $categories=Category::pluck('name','id');
        $tags=Tag::all();

        /* Prbando los objetos que retornan d ela base de datos
        return $categories; */



        return view('admin.posts.create',compact('categories','tags'));
    }

    public function store(PostRequest $request)
    {
        //return Storage::put('posts',$request->file('file'));
        //Validando las reglas de validacion
        $post=Post::create($request->all());
        
        if($request->file('file')){
            $url=Storage::put('posts',$request->file('file'));

            $post->image()->create([
                'url'=>$url
            ]);
        }

        if($request->tags){
            $post->tags()->attach($request->tags);

        }
        return redirect()->route('admin.posts.edit',$post);
    }

    public function show(Post $post)
    {
        return view('admin.posts.show' , compact('post'));
    }


    public function edit(Post $post)
    {
        $categories=Category::pluck('name','id');
        $tags=Tag::all();
        return view('admin.posts.edit' , compact('post','categories','tags'));
    }


    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        if($request->file('file')){
           $url= Storage::put('posts',$request->file('file'));
           
           if($post->image){
               Storage::delete($post->image->url);
               $post->image->update([
                   'url'=> $url
               ]);
           }
           else{
               $post->image()->create([
                   'url'=> $url
               ]);
           }
        }

        return redirect()->route('admin.posts.edit', $post)->with('info','El post se actualizó con éxito');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('info','la etiqueta se eliminó con éxito');
    }
}
