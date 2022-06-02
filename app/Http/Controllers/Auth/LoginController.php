<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
    protected $ldapService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LdapService $ldapService)
    {
      //  dd("faizal12234");
        $this->middleware('guest')->except('logout');
        $this->ldapService = $ldapService;
    }


    public function login(Request $request)
    {
    //  dd($request->get('username'));
      $email = $request->get('username');
      $pass = $request->get('password');
        //dev
        $dbUser = User::where('email', $email)
                      ->where('password',$pass)
                      ->first();
       if( $dbUser){
        Auth::login($dbUser);
        return redirect('/Expenses');
       }else{
        return redirect()->back()->with('error',"Incorrect Email or Password");   
       }
       

    }

}
