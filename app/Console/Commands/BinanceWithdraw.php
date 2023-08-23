<?php

namespace App\Console\Commands;

use App\Models\Withdraw;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class BinanceWithdraw extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'binance:withdraw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Approve Binance Withdraw for VIP Users Only';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = env('BINANCE_API_KEY');
        $apiSecret = env('BINANCE_API_SECRET');
        $timestamp = round(microtime(true) * 1000);

        // Prepare the request data
        $data = [
            'timestamp' => $timestamp,
            'coin' => 'USDT',
            'network' => 'TRX',
            'address' => 'TYT5KQrcDimBSExcGhfN7nfRrFHHAhDVYq',
            'amount' => 1.01,
        ];
        $data['signature'] = hash_hmac('sha256', http_build_query($data), $apiSecret);

        // Make a POST request to submit the withdrawal request
        $response = Http::withHeaders([
            'X-MBX-APIKEY' => $apiKey,
        ])->post('https://api.binance.com/sapi/v1/capital/withdraw/apply', $data);

        info($response);
    }
}
