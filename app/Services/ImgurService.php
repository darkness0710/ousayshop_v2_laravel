<?php
 
namespace App\Services;

// client ID 1494fabf4e3fc30
// client sercet 899b31413b9407b28bb715ce34e54c11924b8aa4

use GuzzleHttp\Client;

class ImgurService
{
    const END_POINT = 'https://api.imgur.com/3/image';

    public function uploadImage($request, $inputFieldName = 'file')
    {
        try {
            $imagePath = $request->file($inputFieldName)->getRealPath();
            $fileName = $request->file($inputFieldName)->getClientOriginalName();
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
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
        return $data;
    }

    public function uploadAvatar($url)
    {
        $client = new Client();
        $request = $client->request(
            'POST',
            self::END_POINT,
            [
                'headers' => [
                    'Authorization' => "Client-ID 1494fabf4e3fc30",
                ],
                'form_params' => [
                    'image' => file_get_contents($url)
                ]
            ]
        );
        $response = (string) $request->getBody();
        $jsonResponse = json_decode($response);

        $data = [
            'file_name' => '',
            'size' => $jsonResponse->data->size,
            'src' => $jsonResponse->data->link
        ];
        return $data;
    }
}