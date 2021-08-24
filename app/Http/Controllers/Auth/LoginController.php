<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/contato';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function username() {
        return 'email';
    }
    
    protected function validateLogin(Request $request) {
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ]);
    }

    protected function credentials(Request $request) {
        return $request->only($this->username(), 'senha');
    }
    

    public function createUser(Request $request) {
        $email = $request->input('email');
        $name = $request->input('name');
        $senha = $request->input('password');


        $userRequest = new User();
        $userRequest->email = $email;
        $userRequest->name = $name;
        $userRequest->password = md5($senha);
        $userRequest->save();

        $user = User::where([
            'email' => $email,
            'password' => md5($senha)
        ])->first();

        if ($user) {
            return redirect("register")->with(["success" => "Registro criado com sucesso!"]);
        }
    }

    public function authenticate(Request $request) {
        $email = $request->input('email');
        $senha = $request->input('password');
        
        $user = User::where([
            'email' => $email,
            'password' => md5($senha)
        ])->first();

        if ($user) {
            Auth::login($user);
            // $this->guard()->login($user);
            //return redirect("admin");
            return redirect("/");
            /*
            if (Auth::guard('web')->login($user)) {
                return redirect("/");
            }
            */
        } else {
            return "Não encontrado";//bcrypt($request->input('password'));
        }
    }

    public function logout() {
        Auth::logout();
        return redirect("/");
    }
}