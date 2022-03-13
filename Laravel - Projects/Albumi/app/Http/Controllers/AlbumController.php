<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Image;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        if (isset($query) && !empty($query))
            $albums = Album::where('title', 'like', '%' . $query . '%')->orderBy('id', 'DESC')->get();
        else
            $albums = Album::orderBy('id', 'DESC')->get();

        return view('Album.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('Album.create');
    }

    public function show($id)
    {
        $album = Album::find($id);
        $image = $album->Images(); #Model images function

        return view('Album.show')->with('albums', $album);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|min:3',
        ]);
        if (Album::create($request->only('title')))
            return redirect()->route('albums.index')->with('success', 'Albumi u shtua me sukses');
        else
            return redirect()->back()->with('error', 'Dicka shkoj keq ju lutem provoni perseri');
    }

    public function edit($id)
    {
        $albums = Album::find($id);
        return view('Album.edit')->with('albums', $albums);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255|min:3',
        ]);

        $album = Album::find($id);
        if ($album->update($request->only('title')))
            return redirect()->route('albums.index')->with('success', 'Albumi u ndryshua me sukses');
        else
            return redirect()->back()->with('error', 'Dicka shkoj keq ju lutem provoni perseri');
    }

    public function destroy($id)
    {
        $album = Album::find($id);
        $album->Images()->delete();
        if ($album->delete()) {
            return redirect()->route('albums.index')->with('success', 'Albumi dhe fotografit ne album u Fshien me sukses');
        } else
            return redirect()->back()->with('error', 'Dicka shkoj keq ju lutem provoni perseri');
    }
}
