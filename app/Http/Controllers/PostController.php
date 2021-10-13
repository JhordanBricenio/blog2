<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    
    public function index(){
        $posts=Post::where('status',2)->latest('id')->paginate(8);

        return view('posts.index',compact('posts'));

    }

    public function show(Post $post){
        $similares=Post::where('category_id',$post->category_id)
                            ->where('status',2)//Solo publicados
                            ->where('id','!=',$post->id)
                            ->latest('id')//ordenar descen de acuerdo con id
                            ->take(4)//Solo 4 relacionados
                            ->get();
        return view('posts.show',compact('post','similares'));
    }

    public function category(Category $category){
        $posts=Post::where('category_id',$category->id)
                    ->where('status',2)
                    ->latest('id')
                    ->paginate(6);
        return view('posts.category', compact('posts','category'));

    }
    public function tag(Tag $tag){
        return $tag;

    }
}
