<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $extenstion = $request->file('image')->getClientOriginalExtension();
        $newName = "image" . '-' . now()->timestamp . '.' . $extenstion;
        $request->file('image')->storeAs('public/images', $newName);

        $url = asset('storage/public/images/'.$newName);

        return response()->json([
            "url" => $url
        ]);
        
    }
}
