<?php

namespace App\Http\Controllers\Admin;

use App\Configuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configuration = Configuration::find(1);
        return view('admin.configuration.index', ["configuration"=>$configuration]);
    }

    public function update(Request $request, $id)
    {
        $configuration = Configuration::find($id);
        $configuration->whatsapp = $request->whatsapp;
        $configuration->instagram = $request->instagram;
        $configuration->facebook = $request->facebook;
        $configuration->save();

        return redirect('admin/configuracion')->with('success', 'Configuración actualizada correctamente.');
    }
}
