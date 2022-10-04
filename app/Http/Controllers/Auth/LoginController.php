<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    /**
     * Sobreecribimos la validacion que ofrece laravel 
     */   

    // Metodo que valida los datos del formulario 
    protected function validateLogin(Request $request)
    {
        try {
            // el metodo al validar, si la validacion falla lanza una exception
            $request->validate([
                $this->username() => 'required|string',
                'password' => 'required|string',
            ], []);

        // capturamos la exception del tipo ValidationException 
        } catch (ValidationException $exception) {
            // creamos una sesion flash error-login con el mensaje
            session()->flash('error-login', __('Las credenciales son incorrectas')); // muestra el msj en la ventana modal y no muestra errores de validacion en el registro de usuarios
            return back();
        }
    }

    // Metodo que valida los datos contra base de datos, si no hacen match con los datos introducidos en bd
    protected function sendFailedLoginResponse(Request $request)
    {
        session()->flash('error-login', __('Las credenciales son incorrectas'));
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

}
