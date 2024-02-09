<?php

namespace App\Http\Controllers;
use App\Mail\ConfirmEmail;
use App\Mail\RedefinirSenhaMail;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }
    public function forgotPassword() {
        return view('auth.forgotPass');
    }
    public function redefinirSenhaView(User $user)
    {
        return view('auth.newPass', compact('user'));
    }
    public function redefinirSenhaEmail(Request $request) {
        $user = User::where('email', $request->email)->first();
        $msg = $this->service->redefinirSenhaEmail($user);
        return redirect()->route('user.login')->with('msg', $msg);
    }
    public function redefinirSenha(User $user, Request $request)
    {
        $user->update([
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('user.login')->with('msg', 'Senha redefinida com sucesso!');
    }
    public function accessDenied() {
        return redirect()->route('user.login')->with('error', 'Faça Login para acessar esta página!');
    }

    public function login() {
        return view('clientes.login');
    }

    public function logout(Request $request) {
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
        $msg = $this->service->create($input);
        return redirect()->route('user.login')->with('msg', $msg);
    }

    public function confirmEmail($id){ // PASSAR PARA O SERVICE
        $user = User::find($id);
        $msg = $this->service->confirmEmail($user);
        return redirect()->route('user.login')->with('msg', $msg);
    }

    public function resendEmail(User $user) {
        Mail::to($user->email)->send(new ConfirmEmail([$user->id]));
        return redirect()->route('user.login')->with('msg', 'E-mail de confirmação reenviado para seu email!');
    }

    public function edit() {
        $user = Auth::user();
        return view('clientes.dados', compact('user'));
    }

    public function update(Request $request) {
        $input = $request->validate([
            'name' => 'required|string'
        ]);
        $msg = $this->service->update($input);
        return redirect()->back()->with('notificacao', $msg);
    }
}
