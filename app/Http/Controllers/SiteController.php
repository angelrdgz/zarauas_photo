<?php

namespace App\Http\Controllers;

use App\Album;
use App\Configuration;
use App\ConfigurationPhoto;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function welcome()
    {
        $albums = Album::all();
        $configuration = Configuration::find(1);
        $photo = ConfigurationPhoto::all()->random(1);
        return view('welcome', ["albums"=>$albums, "configuration"=>$configuration, "photo"=>$photo]);
    }

    public function gallery($id)
    {
        $album = Album::find($id);
        return view('gallery', ["album"=>$album]);
    }
}
