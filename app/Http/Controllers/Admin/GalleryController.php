<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index($album_id)
    {
        $album = Album::find($album_id);
        return view('admin.galleries.index', ["album"=>$album]);
    }

    public function store(Request $request, $album_id)
    {
        $imageName = Str::random(10) . '.' . 'jpg';
        
        $photo = new Photo();
        $photo->album_id = $album_id;
        $photo->filename = $imageName;
        $photo->save();
        
        $request->file('file')->storeAs('images/albums/' . $album_id.'/photos', $imageName, 'public');

        return response()->json(["msg"=>"Photo added succesfully"], 200);
    }

    public function destroy(Request $request, $album_id, $photo_id)
    {
        $photo = Photo::find($photo_id);
        if (\File::exists(public_path('images/albums/' . $album_id . '/photos/' . $photo->filename))){
            \File::delete(public_path('images/albums/' . $album_id . '/photos/' . $photo->filename));
        }
        $photo->delete();

        return redirect()->back()->with('success', 'Foto eliminada correctamente.');
    }
}
