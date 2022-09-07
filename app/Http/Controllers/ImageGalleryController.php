<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $images = ImageGallery::get();
        return view('gallery.gallery', compact('images'));
    }

    /**
     * Upload image function
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(GalleryRequest $request)
    {

        $file = new ImageGallery();

        $file->title = $request->title;
        $path = Storage::putFile('public',$request->file('image'));
        $url=Storage::url($path);
        $file->pathImage = $url;

        $file->save();

        return back()
            -> with('success', 'Картинка успішно додана.');

    }

    public function upload(Request $request)
    {
        $index = new ImageGallery();

        $folderPath = public_path('storage/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.png';

        $index->title = $request->title;
        $path = basename($file);
        $index->pathImage = ('/storage/'.$path);

        file_put_contents($file, $image_base64);

        $index->save();

        return response()->json(['success'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageGallery  $images
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $images=ImageGallery::find($id);
        $images->delete();

        $dfile=$images->pathImage;
        $file = basename($dfile);
        Storage::delete('public/'.$file);

        return back()
            ->with('success', 'Картинка успішно видаленна');
    }

}
