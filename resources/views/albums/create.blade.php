@extends('layouts.app')

@section('content')


        <h1>Create Album</h1>


    {!! Form::open(['action' => 'AlbumsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {!! Form::bsText('name','',['placeholder' => 'Album Name']) !!}
    {!! Form::bsTextArea('description','',['placeholder' => 'Album Desciption']) !!}
    {!! Form::bsFile('cover_image') !!}
    {!! Form::bsSubmit('submit') !!}
    {!! Form::close() !!}

@endsection