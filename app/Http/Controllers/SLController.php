<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donations;
use App\Models\Followers;
use App\Models\MerchSales;
use App\Models\Subscribers;
use Illuminate\Support\Facades\Log;

class SLController extends Controller
{
    //
    public function getSLInfo(){
        return view('welcome', ["Donations" => Donations::all(), "Followers" => Followers::all(), "MerchSales" => MerchSales::all(), "Subscribers" => Subscribers::all()]);
    }

    public function saveItem(Request $request){
        Log::info(json_encode(($request->all())));
        Donations::generateRandomDonations();
        Followers::generateRandomFollowers();
        MerchSales::generateRandomMerchSales();
        Subscribers::generateRandomSubscribers();

        return redirect('/');
    }
}
