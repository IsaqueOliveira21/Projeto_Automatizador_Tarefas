<?php

namespace App\Http\Controllers;
use App\Mail\ConfirmEmail;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function accessDenied() {
        return redirect()->route('user.login')->with('error', 'Faça Login para acessar esta página!');
    }

    public function login() {
        return view('clientes.login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('user.login');
    }

    public function formLogin(Request $request) {
        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        return $this->service->login($input);
    }

    public function create() {
        return view('clientes.register');
    }

    public function store(Request $request) {
        if($request->passwordConfirm != $request->password) {
            return view('clientes.register', ['msg' => 'As senhas inseridas não coincidem!']);
        }
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        return $this->service->create($input);
    }

    public function confirmEmail($id){ // PASSAR PARA O SERVICE
        $user = User::find($id);
        if(!isset($user->email_verified_at)) {
            $user->update([
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            return redirect()->route('user.login')->with('confirmEmail', 'E-mail verificado com sucesso!');
        } else {
            return redirect()->route('user.login')->with('confirmEmail', 'Seu e-mail ja foi verificado!');
        }
    }

    public function resendEmail(User $user) {
        Mail::to($user->email)->send(new ConfirmEmail([$user->id]));
        return redirect()->route('user.login')->with('confirmEmail', 'E-mail de confirmação reenviado para seu email!');
    }

    public function edit() {
        $user = Auth::user();
        return view('clientes.dados', compact('user'));
    }

    public function update(Request $request) {
        $input = $request->validate([
            'name' => 'required|string'
        ]);
        return $this->service->update($input);
    }
}
