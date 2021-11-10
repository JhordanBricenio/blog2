@extends('adminlte::page')

@section('title', 'devEloper')

@section('content_header')
    <h1>Crear nuevo Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.posts.store','autocomplete'=> 'off']) !!}
           {{--  Recepsionando el id del usuario para asiganrle el post a este en un input oculto hidden --}}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
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
                    <hr>
                    @error('tags')
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
                    <hr>
                    @error('status')
                        <small class="text-danger">{{$message}}</small>
                     @enderror
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

                {!! Form::submit('Crear post', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection