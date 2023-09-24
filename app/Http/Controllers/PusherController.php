<?php

namespace App\Http\Controllers;

use App\Events\MessageNotificationPusher;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    
    public function index(){
            return view('pusher.index');
    }
    public function receive(Request $request){
        return view('pusher.receive',['message'=>$request->get('message')]);
    }
    public function broadcast(Request $request){
        broadcast(new MessageNotificationPusher($request->get('message')))->toOthers();
        return view('pusher.broadcast',['message'=>$request->get('message')]);
    }
}
