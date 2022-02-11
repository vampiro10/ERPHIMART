<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Prestashop;
use Protechstudio\PrestashopWebService\PrestashopWebService;
use Protechstudio\PrestashopWebService\PrestaShopWebserviceException;

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
        $this->middleware('guest')->except('login','logout');
    }

    public function login(Request $request){

        $email = $request->email;
        $password = $request->password;

        $optUser = array(
            'resource' => 'customers',
            'filter[email]' => '[' . $email . ']',
            'display' => '[id,email,lastname,firstname,passwd]'
        );

        $webService = Prestashop::get($optUser);
        
        // $resultUser = ($webService->get($optUser));

        foreach ($webService->customers->customer as $info) {

            if (password_verify($password, $info->passwd) == true) {
                
                $_SESSION['user'] = ['email' => $email];
                return redirect()->intended('admin/productos');

            } else {

                return redirect('login');
                
            }
        }

    }

}
