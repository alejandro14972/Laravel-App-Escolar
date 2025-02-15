<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdjuntosController extends Controller
{
    public function store(Request $request){
        $adjunto = $request->file('file');


        $nombreAdjunto = Str::uuid() . '.' . $adjunto->extension();
        $adjuntopatch = public_path('adjuntos/' . $nombreAdjunto);
        



        return response()->json(['adjunto' => $nombreAdjunto]);
    }
}
