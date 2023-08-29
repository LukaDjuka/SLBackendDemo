<?php

namespace App\Http\Controllers;

use App\Models\Donations;
use App\Models\Followers;
use App\Models\MerchSales;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MarkAsReadController extends Controller
{
    //

    public function markAsRead(Request $request){
        Log::info(json_encode(($request->all())));
        if ($request->followerId){
            $id = 1; // Replace with the actual ID you want to query
            $follower = Followers::find($id);
    
            if ($follower) {
                $follower->read = true;
                $follower->save();
            }
        }
        else if ($request->subscriberId){
            $id = 1; // Replace with the actual ID you want to query
            $subscriber = Subscribers::find($id);
    
            if ($subscriber) {
                $subscriber->read = true;
                $subscriber->save();
            }
        }
        else if ($request->donationId){
            $id = 1; // Replace with the actual ID you want to query
            $donation = Donations::find($id);
    
            if ($donation) {
                $donation->read = true;
                $donation->save();
            }
        }
        else if ($request->merchId){
            $id = 1; // Replace with the actual ID you want to query
            $merch = MerchSales::find($id);
    
            if ($merch) {
                $merch->read = true;
                $merch->save();
            }
        }

        return redirect('/');
    }
}
