<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImgurService;

class CkeditorController extends Controller
{
    protected $_imgurService;

    public function __construct(ImgurService $imgurService)
    {
        $this->_imgurService = $imgurService;
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $data = $this->_imgurService->uploadImage($request, 'upload');
            $url = $data['src'];
            $msg = 'Image uploaded successfully'; 
            $cEditorFuncNum = $request->input('CKEditorFuncNum');
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($cEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
