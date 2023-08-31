<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ContactForm;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use App\Models\DepositWithdraw;
use App\Models\VerificationDocument;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    

    public function savePfp(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:4000',
        ]);
    
        $user = auth()->user();
    
        // Delete the old profile picture if it exists
        if ($user->avatar) {
            Storage::delete('public/avatars/' . $user->avatar);
        }
    
        $filename = $user->id . '-' . uniqid() . '.jpg';
    
        $imgData = Image::make($request->file('file'))->fit(300)->encode('jpg');
        Storage::put('public/avatars/' . $filename, $imgData);
    
        $user->avatars = $filename;
        /** @var \App\Models\User $user */
        $user->save();
    
        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }
    


    public function storeDocs(Request $request)
    {
        $request->validate([
            'personal-id-front' => 'required|file',
            'personal-id-back' => 'required|file',
            'personal-selfie' => 'required|file',
            'personal-poa' => 'required|file',
        ]);
    
        // Get the authenticated user account
        $userAccount = auth()->user()->userAccount;
        if ($userAccount->verificationDocument()->exists()) {
            return redirect()->back()->with('error', 'Verification documents already uploaded.');
        } 
        // Handle file uploads and save the verification document record
        $verificationDocument = new VerificationDocument();
    
        $verificationDocument->user_account_id = $userAccount->id;
        $verificationDocument->personal_id_front = $request->file('personal-id-front')->store('verification');
        $verificationDocument->personal_id_back = $request->file('personal-id-back')->store('verification');
        $verificationDocument->personal_selfie = $request->file('personal-selfie')->store('verification');
        $verificationDocument->personal_poa = $request->file('personal-poa')->store('verification');
    
        $verificationDocument->save();
    
        return redirect()->back()->with('success', 'Verification documents uploaded successfully.');
    }


public function contactPage(Request $request){

    $incomingData = $request->validate([
        'contact-name'=> 'required|min:2|max:40',
        'contact-lname'=> 'required|min:2|max:40',
        'contact-email'=> 'required|min:2|max:50|email',
        'contact-message'=> 'required|min:2|max:400',
        'contact-title'=> 'required|min:2|max:70',
        'contact-tel'=> 'required|min:7|max:13'
    ]);

    $contact= new ContactForm();
    $contact->name = $incomingData['contact-name'] .' '. $incomingData['contact-lname'];
    $contact->email = $incomingData['contact-email'];
    $contact->message = $incomingData['contact-message'];
    $contact->title = $incomingData['contact-title'];
    $contact->tel= $incomingData['contact-tel'];
    $contact->save();
    return redirect()->route('contact')->with('success','Message has been sent!');
}

    public function contact(Request $request){

        $incomingData = $request->validate([
            'name'=> 'required|min:2|max:40',
            'email'=> 'required|min:2|max:50|email',
            'message'=> 'required|min:2|max:300'
        ]);

        $contact= new ContactForm();
        $contact->name = $incomingData['name'];
        $contact->email = $incomingData['email'];
        $contact->message = $incomingData['message'];
        $contact->save();
        return redirect()->route('support-get')->with('success','Message has been sent!');
    }



    public function saveDepositWd(Request $request){
        $incomingData = $request->validate([
            'amount'=> 'required|min:2|max:20',
            'currency'=> 'required',
            'method'=> 'required',
            'transactionType'=> 'required',
            'accountNumber'=>'required',
            'bankName'=>'required',
            'bankAddress'=>'required',
        ]);

        if($incomingData['transactionType']=='withdraw'&& auth()->user()->userAccount->balance < $incomingData['amount'] ){
            return redirect()->route('deposit-wd')->with('failure','Insufficent funds !!!');
        }else{
        $depositWd = DepositWithdraw::create([
            'user_account_id' => auth()->user()->userAccount->id,
            'amount'=>$incomingData['amount'],
            'currency'=> $incomingData['currency'],
            'method'=> $incomingData['method'],
            'transaction_type'=> $incomingData['transactionType'],
            'account_number'=>$incomingData['accountNumber'],
            'bank_name'=>$incomingData['bankName'],
            'bank_address'=>$incomingData['bankAddress'],
            'description'=>$request->description,
        ]);
    
            return redirect()->route('deposit-wd')->with('success','Request Sent!');
        }
    }




    public function requestsList()
{
    $userAccountId = auth()->user()->userAccount->id;

    $requests = DepositWithdraw::where('user_account_id', $userAccountId)->get();

    return view('auth-views.deposit-withdraw', ['requests' => $requests]);
}





//Used to feed balance data to the chart.js chart in the dashboard , barely works.
public function getChartData()
{
    $user = auth()->user();
    $userAccount = $user->userAccount;

    if (!$userAccount) {
        // User account does not exist, return default chart data
        $chartData = [
            'labels' => ['1 Month Ago', '1 Week Ago', 'Today'],
            'balanceData' => [0, 0, 0],
        ];

        return response()->json($chartData);
    }

    // Retrieve the balance value for today
    $balanceToday = $userAccount->balance;

    // Retrieve the average balance values for the specified time periods
    $oneWeekAgo = Carbon::today()->subWeek();
    $oneMonthAgo = Carbon::today()->subMonth();

    $balanceOneMonthAgo = UserAccount::where('user_id', $user->id)
        ->whereBetween('created_at', [$oneMonthAgo, Carbon::today()])
        ->avg('balance');

    $balanceOneWeekAgo = UserAccount::where('user_id', $user->id)
        ->whereBetween('created_at', [$oneWeekAgo, Carbon::today()])
        ->avg('balance');

    $chartData = [
        'labels' => ['1 Month Ago', '1 Week Ago', 'Today'],
        'balanceData' => [$balanceOneMonthAgo, $balanceOneWeekAgo, $balanceToday],
    ];

    return response()->json($chartData);
}



}
