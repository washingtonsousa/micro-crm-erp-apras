<?php

namespace App\Http\Controllers;

use App\Core\Application\Abstraction\Interface\Service\IUserAppService;
use App\Core\Application\ViewModel\UserViewModel;
use App\Core\Shared\Abstraction\Interface\IDomainNotificationContainer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    private IUserAppService $userAppService;

    public function __construct(IUserAppService $userAppService)
    {
        $this->userAppService = $userAppService;
    }


    public function register(Request $request)
    {
        $result = $this->userAppService->register(UserViewModel::fromArray($request->all()));

        return response()->json(['token' => "teste"], 200);
    }

    /**
     * Login Req
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {

            $token = auth()->user()->createToken('Laravel Password Grant Client')->accessToken;

            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function userInfo()
    {

        $user = auth()->user();

        return response()->json(['user' => $user], 200);
    }
}
