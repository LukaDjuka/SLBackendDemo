<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    use HasFactory;

    public $name;
    public $subscriptionTier;
    public $read;
    public $created_at;
    public $updated_at;

    // public function __construct($name, $subscriptionTier){
    //     $this->name = $name;
    //     $this->subscriptionTier = $subscriptionTier;
    // }

    static function generateRandomSubscribers($count = 10) {
        for ($i = 0; $i < $count; $i++) {
            $sub = new Subscribers();
            
            // Generate random name
            $sub->name =  substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 5);

            // Generate random tier
            $sub->subscriptionTier = (rand(1, 3));
            
            // Generate random timestamp within the last 3 months
            $timestamp = time() - rand(0, 7776000); // 7776000 seconds = 3 months
            $sub->created_at = date("Y-m-d H:i:s", $timestamp);
            $sub->updated_at = date("Y-m-d H:i:s", $timestamp);
                
            // Log::info("Debug message: Amount={$follower->amount}, Currency={$follower->currency}, Message={$follower->followerMessage}, Timestamp={$follower->created_at}");
            // var_dump($follower);
            // $followers[] = $follower;
            $sub->save();

        }
    }
}
