<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    
    public function storeInDb(Request $request){



        $validatedData = $request->validate([
            'username' => 'required|min:6|unique:users|max:25',
            'pass' => 'required|min:8|confirmed',
            'email' => 'required|email|unique:users|max:50',
    
         ]);

         $validatedData['pass']= bcrypt($validatedData['pass']);
    
        $user = new User();
        $user->username = $validatedData['username'];
        $user->password = $validatedData['pass'];
        $user->email = $validatedData['email'];
        $user->save();
        

        return redirect('/')->with('message', 'Data saved successfully!');
}

public function retrieveFromDb(){

    $users = User::all();

    return view('sent', ['userData' => $users]);
}

public function login(Request $request){
    $comingData = $request->validate([
        'login_usname'=> 'required',
        'login_pass'=> 'required'
    ]);


    if(auth()->attempt(['username'=>$comingData['login_usname'],'password'=>$comingData['login_pass']])){
        $request->session()->regenerate();  
       
        return redirect()->route('dashboard')->with('success','Logged In');
        

    }else{
        return 'Sorry';
    }
}

public function showCorrectPage()
{
    if (auth()->check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('home');
    }
}


public function logout()
{
    auth()->logout();
    return redirect()->route('welcome')->with('message', 'Logged Out!');
}


}
