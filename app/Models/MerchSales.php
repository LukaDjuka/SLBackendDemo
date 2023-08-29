<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchSales extends Model
{
    use HasFactory;

    public $itemName;
    public $amount;
    public $price;
    public $read;
    public $created_at;
    public $updated_at;

    static function generateRandomMerchSales($count = 10) {
        for ($i = 0; $i < $count; $i++) {
            $merchsale = new MerchSales();

            $items = ["Shirt", "Socks", "Mousepad", "Pencil", "Waterbottle"];
            $merchsale->itemName = $items[array_rand($items)];

            // Generate random amount
            $merchsale->amount = (rand(1, 3));

            $merchsale->price = (rand(1, 40));

            // Generate random timestamp within the last 3 months
            $timestamp = time() - rand(0, 7776000); // 7776000 seconds = 3 months
            $merchsale->created_at = date("Y-m-d H:i:s", $timestamp);
            $merchsale->updated_at = date("Y-m-d H:i:s", $timestamp);
                
            // Log::info("Debug message: Amount={$follower->amount}, Currency={$follower->currency}, Message={$follower->followerMessage}, Timestamp={$follower->created_at}");
            // var_dump($follower);
            // $followers[] = $follower;
            $merchsale->save();

        }
    }
}
