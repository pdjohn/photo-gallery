@extends('layouts.app')

@section('content')

    <h1>Upload Photo</h1>

    {!! Form::open(['action' => 'PhotosController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {!! Form::bsText('title','',['placeholder' => 'Photo Title']) !!}
    {!! Form::bsTextArea('description','',['placeholder' => 'Photo Desciption']) !!}
    {!! Form::hidden('album_id', $album_id) !!}
    {!! Form::bsFile('photo') !!}
    {!! Form::bsSubmit('submit') !!}
    {!! Form::close() !!}

@endsection