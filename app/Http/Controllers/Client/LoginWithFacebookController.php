<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Exception;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Services\ImgurService;

class LoginWithFacebookController extends Controller
{
    protected $_imgurService;

    public function __construct(ImgurService $imgurService)
    {
        $this->_imgurService = $imgurService;
    }

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();
        
            if ($finduser) {
                Auth::guard('web')->login($finduser);

                return redirect()->route('client.home.index');
            }
            $dataImgur = $this->_imgurService->uploadAvatar($user->avatar);
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'facebook_id'=> $user->id,
                'avatar_fb' => $dataImgur['src'],
                'password' => encrypt('admin123')
            ]);
        
            Auth::guard('web')->login($newUser);
    
            return redirect()->route('client.home.index');
        } catch (Exception $e) {
            dd('Chức năng đăng nhập facebook đang lỗi, vui lòng liên hệ với Tún!');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('web')->logout();
  
        return redirect()->route('client.home.index');
    }
}