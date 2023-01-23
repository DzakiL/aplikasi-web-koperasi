<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    // public function username()
    // {
    //     return 'name';
    // }

    protected function authenticated(Request $request, $user)
    {
        // dd($user);
        //redirect halaman saat login sesuai role
        if ($user->hasRole('admin')) {
            return redirect()->route('dashboard');
            // return response()->json(["message" => "Admin Berhasil Login"], 200);
        }
        if ($user->hasRole('pengawas')) {
            return redirect()->route('dashboard');
        }
        if ($user->hasRole('kepala desa')) {
            return redirect()->route('dashboard');
        }
        if ($user->hasRole('ketua bumdes')) {
            return redirect()->route('dashboard');
        }
        if ($user->hasRole('super admin')) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $checkUser = User::where('name', $request->name)->first();
        if ($checkUser) {
            $credentials = $request->only('name', 'password');
            if (auth()->attempt($credentials)) {
                $user = auth()->user();
                return $this->authenticated($request, $user);
            }
        }
        return redirect('login');
    }
}
