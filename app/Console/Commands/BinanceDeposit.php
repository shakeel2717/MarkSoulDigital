<?php

namespace App\Console\Commands;

use App\Models\Tid;
use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class BinanceDeposit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:deposits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch All Binance Deposits and Approved Them';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = env('BINANCE_API_KEY');
        $apiSecret = env('BINANCE_API_SECRET');
        $timestamp = round(microtime(true) * 1000);

        $params = [
            'timestamp' => $timestamp,
            // Add other required parameters as needed
        ];
        $params['signature'] = hash_hmac('sha256', http_build_query($params), $apiSecret);

        $response = Http::withHeaders([
            'X-MBX-APIKEY' => $apiKey,
        ])->get('https://api.binance.com/sapi/v1/capital/deposit/hisrec', $params);

        info($response);

        $transactions = $response->json();
        foreach ($transactions as $data) {
            // checking if this txid request received
            $tid = Tid::where('hash_id', $data['txId'])->where('status', false)->where('exchange', 'Binance')->first();
            if ($tid == "") {
                goto endThisTxLoop;
            }
            info("Tid Found");
            // checking if the amount is same
            if ($tid->amount - $tid->fees > $data['amount']) {
                $tid->status = 3;
                $tid->save();
                info("Deposit Received, But Amount is less then requested amount");
                goto endThisTxLoop;
            }

            // approving this transaction
            $tid->status = true;
            $tid->save();

            // adding Transaction to user balance
            $transaction = new Transaction();
            $transaction->user_id = $tid->user_id;
            $transaction->type = 'Deposit';
            $transaction->amount = $tid->amount;
            $transaction->status = true;
            $transaction->sum = true;
            $transaction->reference = "Deposit Approved, TxId: " . $tid->hash_id;
            $transaction->save();


            // adding Transaction to user balance
            $transationFees = new Transaction();
            $transationFees->user_id = $tid->user_id;
            $transationFees->type = 'Deposit Fees';
            $transationFees->amount = $tid->fees;
            $transationFees->status = true;
            $transationFees->sum = false;
            $transationFees->reference = "Deposit Approved, TxId: " . $tid->hash_id;
            $transationFees->save();

            endThisTxLoop:
        }
    }
}
