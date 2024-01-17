<?php

namespace App\Services;

use App\Mail\ConfirmEmail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Mail;

class UserService {

    public function login(array $input) {
        try {
            if(Auth::attempt($input)) {
                return redirect()->route('dashboard.index');
            } else {
                dd('Usuario ou senha invalidos');
            }
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }
    public function create(array $input) {
        try {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
            ]);
            Mail::to($user->email)->send(new ConfirmEmail([$user->id]));
            return redirect()->route('user.login');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function update($input) {
        try {
            Auth::user()->update([
                'name' => $input['name']
            ]);
            return redirect()->back();
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }
}

?>
