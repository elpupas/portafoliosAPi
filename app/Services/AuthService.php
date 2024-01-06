<?php
namespace App\Services;
use App\Contracts\AuthServiceInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use League\Config\Exception\ValidationException;

class AuthService implements AuthServiceInterface{

    public function verifyAttemp($credentials){
        if(!Auth::attempt($credentials)){
            throw new HttpResponseException(response()->json(['error' => 'Credenciales invalidas'], 401));
            
        }
        $user = Auth::user();

        $token = $user->createToken('auth_token')->accessToken;

        return [
          'name' => $user->name,
          'token' => $token  
        ];

    }

    public function revokeSession(){
        $user = Auth::user();
        $user->token()->delete();
        
    }

}

?>