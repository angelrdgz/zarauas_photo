<?php

namespace App\Http\Controllers\Admin;

use App\ConfigurationPhoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ConfigurationPhotoController extends Controller
{
    public function store(Request $request, $id)
    {
        $imageName = Str::random(10) . '.' . 'jpg';  
        $photo = new ConfigurationPhoto();
        $photo->configuration_id = $id;
        $photo->filename = $imageName;
        $photo->save();
        
        $request->file('file')->storeAs('images/configuration/covers/'.$id.'/', $imageName, 'public');

        return response()->json(["msg"=>"Photo added succesfully"], 200);
    }

    public function destroy(Request $request, $id, $photo_id)
    {
        $photo = ConfigurationPhoto::find($photo_id);
        if (\File::exists(public_path('images/configuration/covers/1/' . $photo->filename))){
            \File::delete(public_path('images/configuration/covers/1/' . $photo->filename));
        }
        $photo->delete();

        return redirect()->back()->with('success', 'Foto eliminada correctamente.');
    }
}
