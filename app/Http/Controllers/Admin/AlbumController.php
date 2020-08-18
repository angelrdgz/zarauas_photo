<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('admin.albums.index', ["albums" => $albums]);
    }

    public function create()
    {
        return view('admin.albums.create');
    }

    public function store(Request $request)
    {
        $album = new Album();
        $album->name = $request->name;

        if ($request->cover != NULL) {
            $imageName = Str::random(10) . '.' . 'jpg';
            $album->cover = $imageName;
            $album->save();
            if (\File::exists(public_path('images/albums/' . $album->id . '/' . $album->cover))){
                \File::delete(public_path('images/albums/' . $album->id . '/' . $album->cover));
            }
            $request->cover->storeAs('images/albums/' . $album->id, $imageName, 'public');
            //Storage::disk('public')->put('images/albums/' . $album->id . '/' . $imageName, $image);
        }else{
            $album->save();
        }        

        return redirect('admin/albumes')->with('success', 'Album creado correctamente.');
    }

    public function edit($id)
    {
        $album = Album::find($id);
        return view('admin.albums.edit', ["album" => $album]);
    }

    public function update(Request $request, $id)
    {

        $album = Album::find($id);
        $album->name = $request->name;

        if ($request->cover != NULL) {
            if (\File::exists(public_path('images/albums/' . $album->id . '/' . $album->cover))){
                \File::delete(public_path('images/albums/' . $album->id . '/' . $album->cover));
            }
            //$image = $request->cover;  // your base64 encoded
            $imageName = Str::random(10) . '.' . 'jpg';
            $album->cover = $imageName;
            $request->cover->storeAs('images/albums/' . $album->id, $imageName, 'public');
            //Storage::disk('public')->put('images/albums/' . $album->id . '/' . $imageName, $image);
        }

        $album->save();

        return redirect('admin/albumes')->with('success', 'Album actualizado correctamente.');
    }

    public function destroy(Request $request, $id)
    {
        $album = Album::find($id);

        foreach ($album->photos as $photo) {
            if (\File::exists(public_path('images/albums/' . $id . '/photos/' . $photo->filename))){
                \File::delete(public_path('images/albums/' . $id . '/photos/' . $photo->filename));
            }
            $photo->delete();
        }

        $album->delete();

        return redirect('admin/albumes')->with('success', 'Album eliminado correctamente.');
    }
}
