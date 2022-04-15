@extends('adminlte::page')

@section('title', 'devEloper')

@section('content_header')
    <h1>Crear nuevo Post</h1>
@stop

@section('content')
    <div class="card">
        {{-- files==enviar archivos dentro del formulario --}}
        <div class="card-body">
            {!! Form::open(['route'=>'admin.posts.store','autocomplete'=> 'off', 'files'=>true]) !!}
           {{--  Recepsionando el id del usuario para asiganrle el post a este en un input oculto hidden --}}
                
                @include('admin.posts.partials.form')

                {!! Form::submit('Crear post', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
