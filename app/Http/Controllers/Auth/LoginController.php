<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


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

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo() {
//       $user =  \App\User::whereId(Auth::user()->id)->first();
//       dd();
        switch (\App\User::whereId(Auth::user()->id)->first()->role->name) {
        case 'Admin':
        $this->redirectTo = '/home';
        return $this->redirectTo;
        break;

        case 'Student':
        $this->redirectTo = '/student/home';
        return $this->redirectTo;
        break;
        default:
        $this->redirectTo = '/admin/login';
        return $this->redirectTo;
        }
    }

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct() {
            $this->middleware('guest')->except('logout');
        }

    }
    