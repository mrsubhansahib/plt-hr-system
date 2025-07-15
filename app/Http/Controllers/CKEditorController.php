<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/uploads/templates', $filename);

            $url = asset('storage/uploads/templates/' . $filename);

            // Return JavaScript instead of JSON
            $funcNum = $request->input('CKEditorFuncNum');
            $message = 'Image uploaded successfully';

            return response("<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>")
                ->header('Content-Type', 'text/html; charset=utf-8');
        }

        // Error response (important to handle)
        return response("<script>window.parent.CKEDITOR.tools.callFunction(1, '', 'Upload failed');</script>")
            ->header('Content-Type', 'text/html; charset=utf-8');
    }
}
