<?php
 
namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

// client ID 1494fabf4e3fc30
// client sercet 899b31413b9407b28bb715ce34e54c11924b8aa4

class DropzoneController extends \App\Http\Controllers\Controller
{
    const END_POINT = 'https://api.imgur.com/3/image';

    public function store(Request $request)
    {
        $imagePath = $request->file('file')->getRealPath();
        $fileName = $request->file('file')->getClientOriginalName();
        $client = new Client();
        $request = $client->request(
            'POST',
            self::END_POINT,
            [
                'headers' => [
                    'Authorization' => "Client-ID 1494fabf4e3fc30",
                ],
                'form_params' => [
                    'image' => file_get_contents($imagePath)
                ]
            ]
        );
        $response = (string) $request->getBody();
        $jsonResponse = json_decode($response);

        $data = [
            'file_name' => $fileName,
            'size' => $jsonResponse->data->size,
            'src' => $jsonResponse->data->link
        ];
        return response()->json(["status" => "success", "data" => $data]);
    }

    public function delete(Request $request) {
        dd($request->all());
        $image = $request->file('filename');
        $filename =  $request->get('filename').'.jpeg';
        ImageUpload::where('image_name', $filename)->delete();
        $path = public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}