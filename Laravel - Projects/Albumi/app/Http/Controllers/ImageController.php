<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Album;


class ImageController extends Controller
{


    public function create($id)
    {
        $album = Album::find($id);
        return view('Image.create')->with('album', $album);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255|min:3',
            'image' => 'required',
        ]);

        $filename = time() . "." . md5(uniqid()) . ".". $request->image->extension();

        $image = new Image;
        $image->title = $request->title;
        $image->image = $filename;
        $image->album_id = $id;


        if ($image->save()) {
            #Uplodimi i filits
            $request->image->move(public_path('uploads'), $filename);
            return redirect()->route('albums.show', ['album' => $image->album_id])->with('success', 'Fotoja u shtua me sukses');
        } else {
            return redirect()->back()->with('error', 'Dicka shkoj keq ju lutem provoni perseri');
        }
    }

    public function edit($id)
    {
        $image = Image::find($id);
        return view('Image.edit')->with('image', $image);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255|min:3',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $filename = time() . "." . md5(uniqid()) . $request->image->extension();

        $image = Image::find($id);
        $image->title = $request->title;
        $image->image = $filename;



        if ($image->save()) {
            #Uplodimi i filits
            $request->image->move(public_path('uploads'), $filename);
            return redirect()->route('albums.show', ['album' => $image->album_id])->with('success', 'Fotoja u Ndyshua me sukses');
        } else {
            return redirect()->back()->with('error', 'Dicka shkoj keq ju lutem provoni perseri');
        }
    }

    public function destroy($id)
    {
        $image = Image::find($id);
        if ($image->delete()) {
            // unlink(asset('uploads/' . $image->image));
            return redirect()->route('albums.show', ['album' => $image->album_id])->with('success', 'Fotoja u Fshia me sukses');
        } else {
            return redirect()->back()->with('error', 'Dicka shkoj keq ju lutem provoni perseri');
        }
    }
}
