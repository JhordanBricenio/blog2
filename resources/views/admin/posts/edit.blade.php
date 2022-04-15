@extends('adminlte::page')

@section('title', 'devEloper')

@section('content_header')
    <h1>Editar Post</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>

        </div>
    @endif
    <div class="card">
        {{-- files==enviar archivos dentro del formulario --}}
        <div class="card-body">
            {!! Form::model($post,['route'=>['admin.posts.update',$post],'autocomplete'=> 'off', 'files'=>true, 'method' => 'put']) !!}
                
                @include('admin.posts.partials.form')

                {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

