<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if($request->has('image')){

            $image = $request->image;
            $nameFile = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('upload/images');
            $image->move($path, $nameFile);

            return response()->json(
                [
                    'image_path' => '/upload/images/' . $nameFile,
                    'base_url' => url('/')
                ]
                );
        }
    }
    public function uploadMultipleImage(Request $request)
    {
        if($request->has('image')){
            $images = $request->image;
            foreach($images as $key => $image) {
                $nameFile = time(). $key .'.'.$image->getClientOriginalExtension();
                $path = public_path('upload/images');
                $image->move($path, $nameFile);
            }
            return response()->json(
                [
                    'status' => 'successfully uploaded',
                ]
                );


        }

    }
    public function delete($filename)
    {
        // Specify the disk (you can change 'public' to another disk if needed)
        $disk = 'public';

        // Specify the path to the image
        $path = 'images/' . $filename;
        dd($path);
        // Check if the file exists
        if (Storage::disk($disk)->exists($path)) {
            // Delete the file
            Storage::disk($disk)->delete($path);

            return response()->json(['message' => 'Image deleted successfully']);
        } else {
            return response()->json(['message' => 'Image not found'], 404);
        }
    }
}
