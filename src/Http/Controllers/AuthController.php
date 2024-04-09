<?php

namespace Leila\RegistrationPlatform\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Leila\RegistrationPlatform\Models\User;
use Leila\RegistrationPlatform\Http\Requests\LoginRequest;
use Leila\RegistrationPlatform\Http\Requests\OtpRequest;
use Leila\RegistrationPlatform\Traits\SMS;

class AuthController extends Controller
{
    use SMS;
    public function register(Request $request)
    {

        return view('LaView::register');
    }

    public function SendSMS(LoginRequest $request)
    {
        $validatedData = $request->validated();
        $response = $this->SendOtp($validatedData['PhoneNumber']);
        $d = new Carbon($response['data']['dateOtp']);
        $d->timezone = 'Asia/Tehran';
        $response['data']['dateOtp'] = $d->format('H:i:s');
        if($response['status']) return \ReturnMessage::successResponse($request,$response['message'],$response['data']);
        return \ReturnMessage::failResponse($request,$response['message']);
    }

    public function login(OtpRequest $request)
    {
        $validatedData        = $request->validated();
        $result               = $this->VerifyOtp($validatedData);
        if($result['status'])
        {
            /**
             * @var User $user;
             */
            $user             = User::updateOrCreateByPhone($validatedData['PhoneNumber']);
            $token            = $user->createToken('myToken')->plainTextToken;
            $data['token']    = $token;
//            Auth::login($user,1);
            \Illuminate\Support\Facades\Auth::logoutOtherDevices('123456');
            return \ReturnMessage::successResponse($request,$result['msg'],$data);
        }
        return \ReturnMessage::failResponse($request,$result['msg'],[]);
    }

    public function logout(Request $request)
    {

        auth('sanctum')->user()->tokens()->delete();
        return \ReturnMessage::successResponse($request,'برای ورود به سایت مجددا لاگین کنید.');
    }
}
