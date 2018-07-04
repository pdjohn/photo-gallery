<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'cover_image' => 'image|max:1999',

        ]);

        //Get filename with extention
        $filenamewithExt = $request->file('cover_image')->getClientOriginalName();

        //get just filename
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);

        //get extention
        $extention = $request->file('cover_image')->getClientOriginalExtension();

        //create new filename
        $filenameToStore = $filename.'_'.time().'_'.$extention;

        //upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        //create album
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;

        $album->save();

        return redirect('/albums')->with('success', 'Album Created');
    }

    public function show($id)
    {
        $album = Album::with('Photos')->find($id);

        return view('albums.show')->with('album', $album);
    }
}
