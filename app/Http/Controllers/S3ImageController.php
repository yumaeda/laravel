<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class S3ImageController extends Controller
{
    const PROFILE_IMG_DIR = 'images/profiles/';

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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $current_user = auth()->user();

        $image = $request->file('image');
        $image_name = $current_user->id . '.' . $request->image->getClientOriginalExtension();
        Storage::disk('s3')->put(self::PROFILE_IMG_DIR . $image_name, file_get_contents($image), 'public');

        // Update update_at column of users table
        $current_user->touch();

        return back()
            ->with('success','Image Uploaded successfully.')
            ->with('path', Storage::disk('s3')->url(self::PROFILE_IMG_DIR . $image_name));
    }
}

