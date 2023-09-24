<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\AccountType;
use App\Models\ContactForm;
use App\Models\UserAccount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\RegistrationEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Event;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function loginPage()
    {
        if (auth('web')->check()) {
            return redirect()->route('dashboard');
        }
    
        return view('login');
    }

    public function index()
    {
        if (auth('web')->check()) {
            return redirect()->route('dashboard');
        }

        return view('welcome');
    }

    // ...

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|min:2|max:100',
            'lastName' => 'required|min:2|max:100',
            'userName' => 'required|min:2|max:100',
            'email' => 'required|email|max:60',
            'password' => 'required|min:8|max:100|confirmed'
        ]);

        $user = User::create([
            'name' => $validatedData['firstName'],
            'lastname' => $validatedData['lastName'],
            'username' => $validatedData['userName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'api_token' => Str::random(60),
        ]);

        if (!$user->userAccount) {
            $defaultAccountType = AccountType::where('type', 'Standard')->first();

            if ($defaultAccountType) {
                UserAccount::create([
                    'user_id' => $user->id,
                    'balance' => 0.00,
                    'currency' => 'USD',
                    'account_type_id' => $defaultAccountType->id
                ]);
            }
        }

        Auth::guard('web')->login($user);
   
        Event::dispatch( new RegistrationEvent($user));
        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->input('password')
        ];

        if (auth('web')->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with('failed', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
