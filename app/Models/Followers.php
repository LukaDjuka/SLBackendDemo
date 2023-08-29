<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    use HasFactory;

    public $name;
    public $read;
    public $created_at;
    public $updated_at;

    static function generateRandomFollowers($count = 300) {
        for ($i = 0; $i < $count; $i++) {
            $follower = new Followers();
            
            // Generate random name
            $follower->name =  substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 5);
            
            // Generate random timestamp within the last 3 months
            $timestamp = time() - rand(0, 7776000); // 7776000 seconds = 3 months
            $follower->created_at = date("Y-m-d H:i:s", $timestamp);
            $follower->updated_at = date("Y-m-d H:i:s", $timestamp);
                
            // Log::info("Debug message: Amount={$follower->amount}, Currency={$follower->currency}, Message={$follower->followerMessage}, Timestamp={$follower->created_at}");
            // var_dump($follower);
            // $followers[] = $follower;
            $follower->save();

        }
    }
}
