@extends('layouts.app')

@section('content')

    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>

    <a href="/albums/{{$photo->album_id}}" class="btn btn-secondary btn-lg active " role="button" aria-pressed="true">Back To Gallery</a>

    <hr>

    <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">

    <br><br>

    {!! Form::open(['action' => ['PhotosController@destroy', $photo->id],'method' => 'POST']) !!}

    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::submit('Delete Photo', ['class' =>'alert btn-danger']) !!}

    {!! Form::close() !!}
    <hr>

    <small>Size: {{$photo->size}}</small>

@endsection