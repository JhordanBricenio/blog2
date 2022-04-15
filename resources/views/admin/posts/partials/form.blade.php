<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del Post']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el slug del Post','readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}}</small>
     @enderror
</div>
{{--  Mostrando categorias enviados desde el componente de livewire --}}
<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    @error('category_id')
        <small class="text-danger">{{$message}}</small>
     @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>

    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null,null) !!}
            {{$tag->name}}
        </label>
        
    @endforeach 
    @error('tags')
        <br>
        <small class="text-danger">{{$message}}</small>
     @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>
    
    @error('status')
        <br>
        <small class="text-danger">{{$message}}</small>
     @enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            {{--En caso esta definido lo toma de lo contrario imprime lo sgte--}}
            @isset ($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}">
            @else
                <img id= "picture"src="https://cdn.pixabay.com/photo/2020/05/17/19/01/pray-5183171_960_720.jpg" >
            @endif
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrará en el Post') !!}
            {!! Form::file('file', ['class'=>'form-control-file']) !!}
        </div>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptates aliquid ipsam sequi quibusdam. Tempora adipisci enim soluta quidem reiciendis incidunt sit! Temporibus mollitia quia est quod totam sit similique?
    </div>
</div>
<div class="form-group">
    {!! Form::label('extract', 'Extracto:') !!}
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
    @error('extract')
        <small class="text-danger">{{$message}}</small>
     @enderror
</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo de Post:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    @error('body')
        <small class="text-danger">{{$message}}</small>
     @enderror
</div>