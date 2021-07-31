<?php
 
namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\ImgurService;

class DropzoneController extends \App\Http\Controllers\Controller
{
    protected $_imgurService;

    public function __construct(ImgurService $imgurService)
    {
        $this->_imgurService = $imgurService;
    }

    public function store(Request $request)
    {
        $data = $this->_imgurService->uploadImage($request);

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
}