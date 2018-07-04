@extends('layouts.app')

@section('content')

    <h1>{{$album->name}}</h1>

    <a class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" href="/">Go Back</a>

    <a class="btn btn-primary btn-lg active" role="button" aria-pressed="true" href="/photos/create/{{$album->id}}">Upload Photos to Album</a>


    <hr>

    @if(count($album->photos) > 0)
        <?php
        $colcount = count($album->photos);
        $i = 1;
        ?>
        <div id="photos">
            <div class="row text-center">
                @foreach($album->photos as $photo)
                    @if($i == $colcount)
                        <div class='medium-4 columns end'>
                            <a href="/photos/{{$photo->id}}">
                                <img class="img-thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" style="height: 200px; width: 200px">
                            </a>
                            <br>
                            <h4>{{$photo->title}}</h4>
                            @else
                                <div class='medium-4 columns'>
                                    <a href="/photos/{{$photo->id}}">
                                        <img class="img-thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" style="height: 200px; width: 200px">
                                    </a>
                                    <br>
                                    <h4>{{$photo->title}}</h4>
                                    @endif
                                    @if($i % 3 == 0)
                                </div></div><div class="row text-center">
                            @else
                        </div>
                    @endif
                    <?php $i++; ?>
                @endforeach
            </div>
        </div>
    @else
        <p>No Photos To Display</p>
    @endif
@endsection