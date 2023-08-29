<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Donations extends Model
{
    use HasFactory;

    public $amount;
    public $currency;
    public $donationMessage;
    public $read;
    public $created_at;
    public $updated_at;

    protected $guarded = []; // Allow all properties to be mass assigned

    static function generateRandomDonations($count = 10) {
        $donations = [];
        
        for ($i = 0; $i < $count; $i++) {
            $donation = new Donations();
            
            // Generate random amount
            $donation->amount = (rand(1, 10000));
            
            // Select random currency
            $currencies = ["CAD", "USD", "JPY", "Rp", "CHF", "CNY", "EUR", "GBP", "KWD"];
            $donation->currency = $currencies[array_rand($currencies)];
            
            // Select random donation message
            $messages = ["Great Job", "lol", "Good content", "When will you play game X again?", "Thanks for the great content", "Love this video"];

            $donation->donationMessage = $messages[array_rand($messages)];
            
            // Generate random timestamp within the last 3 months
            $timestamp = time() - rand(0, 7776000); // 7776000 seconds = 3 months
            $donation->created_at = date("Y-m-d H:i:s", $timestamp);
            $donation->updated_at = date("Y-m-d H:i:s", $timestamp);
            echo "Amount: " . $donation->amount . "\n";
            echo "Currency: " . $donation->currency . "\n";
            echo "Message: " . $donation->donationMessage . "\n";
                echo "Timestamp: " . $donation->created_at . "\n";
                
            // Log::info("Debug message: Amount={$donation->amount}, Currency={$donation->currency}, Message={$donation->donationMessage}, Timestamp={$donation->created_at}");
            // var_dump($donation);
            // $donations[] = $donation;
            $donation->save();

        }
        
        return $donations;
    }
}
