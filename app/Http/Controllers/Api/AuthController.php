<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected $authService;
   public function __construct(AuthService $authService){
    $this->authService = $authService;
   }
    public function login(LoginRequest $request)
    {
        try{
            $credentials = $request->only('username','password');
          $data =  $this->authService->verifyAttemp($credentials);
          return response()->json(['message' => 'Logueado con exito', 'token' => $data['token']], 200);

            

        }catch(ValidationException $ex){

            return response()->json(['message' => $ex->getMessage()], $ex->getCode());

        }
    }

  
    public function logout()
    {
        $this->authService->revokeSession();
        return response()->json(['message' => 'Hasta la proxima Peter']);
    }
}
