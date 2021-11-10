<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
            {{-- Usamos directiva de blade para saber si estamos en la primer iteracion 
            y hacer una imagen mas grande ne la vista --}}
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif "style="background-image: url(@if($post->image){{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2020/04/13/20/48/dog-5040008_960_720.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tagg)
                                <a href="" class="inline-block px-3 h-6 bg-{{$tagg->color}} text-white rounded-full">{{$tagg->name}}</a>        
                            @endforeach
                                       
                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('posts.show',$post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                </article>

            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>