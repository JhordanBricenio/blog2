<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StorePostRequest;

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

    public function store(StorePostRequest $request)
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
        return view('admin.posts.edit' , compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('info','la etiqueta se eliminó con éxito');
    }
}
