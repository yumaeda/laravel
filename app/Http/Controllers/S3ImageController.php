<?php
namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Storage;

class S3ImageController extends Controller
{
    /**
    * Create view file
    *
    * @access public 
    * @return void
    */
    public function imageUpload()
    {
        return view('image-upload');
    }

    /**
    * Manage Post Request
    *
    * @access public 
    * @param Request $request
    * @return void
    */
    public function imageUploadPost(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $current_user = auth()->user();
        $png_name = $current_user->id . UserService::IMG_FILE_EXTENSION;

        ob_start();
        imagepng(imagecreatefromstring(file_get_contents($request->file('image'))));
        $png_data = ob_get_clean();

        Storage::disk('s3')->put(UserService::IMG_DIR . $png_name, $png_data, 'public');

        // Update update_at column of users table
        $current_user->touch();

        return back()
            ->with('success', true)
            ->with('path', Storage::disk('s3')->url(UserService::IMG_DIR . $png_name));
    }
}

