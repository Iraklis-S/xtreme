<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\AccountType;
use App\Models\ContactForm;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function loginPage(){
        return view('login');
    }
    public function index()
    {
        // Add your logic here
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        // Render the landing page view
        return view('welcome');
    }


    
    public function retrieveReviews(){
        $reviews = Review::all();
        return view('about',['reviews'=>$reviews]);

    }





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
        'password' => bcrypt($validatedData['password'])
    ]);

    
    if (!$user->userAccount) {
        // Get the default account type (assuming ID 1 is for the 'Standard' type)
        $defaultAccountType = AccountType::where('type', 'Standard')->first();

        if ($defaultAccountType) {
            // Create the user account
            $account =  UserAccount::create([
                'user_id' => $user->id,
                'balance' => 0.00,
                'currency' => 'USD',
                'account_type_id' => $defaultAccountType->id
            ]);

         }
        }

    // Additional logic if needed (e.g., sending a confirmation email)
    Auth::login($user);
    return redirect()->route('dashboard'); // Redirect to a success page or home page
}




    
    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required'
        ]);
    
        $credentials = [
            'username' => $request->input('user_name'),
            'password' => $request->input('password')
        ];
        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }
    
        return redirect()->route('login')->with('failed', 'Invalid credentials');
    }
public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
