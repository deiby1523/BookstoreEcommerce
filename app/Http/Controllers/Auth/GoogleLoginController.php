<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User as UserModel;
use Nette\Utils\Random;

function str_random()
{
    $passwordRandom = Random::generate();
    return $passwordRandom;
}

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $existingUser = UserModel::where('email', $user->email)->first();

        if ($existingUser) {
            // Si el usuario existe, autentica al usuario
            Auth::login($existingUser, true);
        } else {
            // Si el usuario no existe, crea un nuevo usuario
            $newUser = new UserModel();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = bcrypt(str_random()); // O puedes generar un password aleatorio
            $newUser->role_id = 2;
            $newUser->save();

            // Autentica al usuario recién creado
            Auth::login($newUser, true);
        }


        return redirect()->route('home'); // Redirige al dashboard o a la ruta que prefieras
    }

}

