<?php

// app/Http/Controllers/PhotoGalleryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('photo_gallery.index', compact('photos'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        Photo::create(['image' => $imageName]);

        return redirect()->route('photo_gallery.index')->with('success', 'Photo uploaded successfully.');
    }
}

