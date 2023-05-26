<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
        $imagen = $request->file('file');
        //Nombre aleatorio para la imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        //Crear y retocar la imagen según la libreria instalada Intervention Image
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000,1000);
        //Mover la imagen al servidor
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);
    }
}
