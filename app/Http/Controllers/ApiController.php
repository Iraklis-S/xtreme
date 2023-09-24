<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trading;
use App\Models\MarketList;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function tradesIndex(Request $request)
    {
        if ($request->query()) {
            $filters = $request->all();


            $query = Trading::query();
            foreach ($filters as $filter => $value) {
                if ($filter == 'status') {
                    $query->whereHas('closedTrade', function ($subQuery) use ($value) {
                        $subQuery->where('status', $value);
                    });

                } else {
                    if ($filter == 'symbol') {
                        $query->where('symbol', 'like', '%' . $value . '%');
                    } else {
                        $query->where($filter, $value);
                    }
                }
            }
            $trades = $query->get();

        } else {

            $trades = Trading::all();
        }
        return response()->json($trades);
    }
    public function index()
    {
            $markets  = MarketList::all();
            return response()->json($markets);
    }
    public function tradeCreate(Request $request)
    {

    }
    public function tradeShow($id)
    {
            $trade =  Trading::with('closedTrade')->findOrFail($id);
            return response()->json($trade);
    }

    public function tradeClose($id)
    {
        $trade = Trading::findOrFail($id);
        $trade->closedTrade()->update([
            'status' => 'closed'
        ]);
    }
    public function userInfo($id)
    {
        $user = User::find($id);

        return response()->json($user);
        
    }
    public function userUpdate($id)
    {

    }
}