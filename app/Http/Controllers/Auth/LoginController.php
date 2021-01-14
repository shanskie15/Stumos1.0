<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // $user = auth()->user();
        // $personnelType = $user['personnel_type'];

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->personnel_type == 'admin') {
                return redirect()->route('admin.index');
            }if (auth()->user()->personnel_type == 'counselor') {
                return redirect()->route('counselor.index');
            }if (auth()->user()->personnel_type == 'librarian') {
                return redirect()->route('librarian.index');
            }if (auth()->user()->personnel_type == 'principal') {
                return redirect()->route('principal.index');
            }if (auth()->user()->personnel_type == 'healthcareprofessional') {
                return redirect()->route('healthcareprofessional.index');
            }if (auth()->user()->personnel_type == 'teacher') {
                return redirect()->route('teacher.index');
            }else{
                return redirect()->route('login')
                    ->with('error','Email-Address And Password Are Wrong.');
            }
            // if(auth()->user()->admin == 1)
            // {
            //     return redirect()->route('admin.index');
            // }else{
            //     switch (Auth::employee()->personnel_type) {
            //         case 'counselor':
            //             return redirect()->route('guidance.index');
            //             break;
            //         case 'librian':
            //             return redirect()->route('library.index');
            //             break;
            //         case 'principal':
            //             return redirect()->route('principal.index');
            //             break;
            //         case 'healthcareprofessional':
            //             return redirect()->route('clinic.index');
            //             break;
            //         case 'teacher':
            //             return redirect()->route('teacher.index');
            //             break;
                    
            //         default:
            //             return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
            //             break;
            //     }
            // }
        }
    }
}