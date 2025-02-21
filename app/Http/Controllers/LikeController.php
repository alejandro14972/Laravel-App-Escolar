<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Recurso;
use Illuminate\Http\Request;

class LikeController extends Controller
{
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Recurso $recurso)
    {


        $recurso->likes()->create([
            'user_id' => $request->user()->id
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Recurso $recurso)
    {
        //dd($request->user());
        //$recurso->likes()->where('recurso_id', $recurso->id)->delete();
        $request->user()->likes()->where('recurso_id', $recurso->id)->delete();
        return back();
    }
}
