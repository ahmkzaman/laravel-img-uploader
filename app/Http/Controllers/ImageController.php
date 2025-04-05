<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(): View
    {
        return view('imageUpload');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        return back()->with('success', 'Image uploaded successfully.')
            ->with('image', $imageName);
    }
    public function destroy(Request $request)
    {
        $imageName = $request->input('image');
        if (!$imageName) {
            return back()->with(['error' => 'Image not found'], 404);
        }
        $imagePath = public_path('images/' . $imageName);
        if (file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath);
            return back()->with('success', 'Image deleted successfully.');
        }
        return back()->with(['error' => 'Image not found or not valid image'], 404);
    }
}
