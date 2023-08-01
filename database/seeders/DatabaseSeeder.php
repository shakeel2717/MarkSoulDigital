<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Option;
use App\Models\Plan;
use App\Models\Post;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Shakeel Ahmad";
        $user->username = "shakeel2717";
        $user->email = "shakeel2717@gmail.com";
        $user->email_verified_at = now();
        $user->password = bcrypt('asdfasdf');
        $user->save();

        $user->transactions()->create([
            'type' => 'Deposit',
            'amount' => 100,
            'status' => true,
            'sum' => true,
            'reference' => "Deposit From Admin",
        ]);


        // adding default package plan
        $plan = new Plan();
        $plan->name = "Silver Package";
        $plan->min_price = 25;
        $plan->max_price = 499;
        $plan->min_profit = 0.75;
        $plan->max_profit = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = "Gold Package";
        $plan->min_price = 500;
        $plan->max_price = 9999;
        $plan->min_profit = 1;
        $plan->max_profit = 1.25;
        $plan->save();

        $plan = new Plan();
        $plan->name = "Diamond Package";
        $plan->min_price = 10000;
        $plan->max_price = 1000000;
        $plan->min_profit = 1;
        $plan->max_profit = 1.50;
        $plan->save();


        $wallet = new Wallet();
        $wallet->name = "Tether";
        $wallet->symbol = "USDT";
        $wallet->icon = "usdt.png";
        $wallet->fees = 1;
        $wallet->address = "kwejrlwjer2l3kj4l2j34ljl";
        $wallet->save();

        // adding payment methods
        $wallet = new Wallet();
        $wallet->name = "Bitcoin";
        $wallet->symbol = "BTC";
        $wallet->icon = "bitcoin.png";
        $wallet->fees = 1;
        $wallet->address = "kwejrlwjer2l3kj4l2j34ljl";
        $wallet->save();

        $wallet = new Wallet();
        $wallet->name = "TRON";
        $wallet->symbol = "TRX";
        $wallet->icon = "trx.png";
        $wallet->fees = 1;
        $wallet->address = "kwejrlwjer2l3kj4l2j34ljl";
        $wallet->save();

        $option = new Option();
        $option->key = 'min_deposit';
        $option->value = 10;
        $option->save();


        $option = new Option();
        $option->key = 'deposit_fees';
        $option->value = 1;
        $option->save();


        $option = new Option();
        $option->key = 'withdraw_fees';
        $option->value = 5;
        $option->save();



        $post = new Post();
        $post->title = 'The Basics of Forex Trading: A Beginner\'s Guide';
        $post->body = 'In this introductory blog post, we cover the fundamental concepts of forex trading, making it an ideal starting point for newcomers to the world of currency trading. From understanding forex markets and currency pairs to learning how to read forex quotes and execute trades, this guide will provide beginners with the essential knowledge and terminology to embark on their forex trading journey confidently.';
        $post->img = null;
        $post->save();

        $post = new Post();
        $post->title = 'Mastering Technical Analysis for Forex Trading';
        $post->body = 'Technical analysis is a powerful tool in the arsenal of successful forex traders. This blog post delves into the world of technical analysis, exploring popular indicators, chart patterns, and price action techniques that help identify trends, entry and exit points, and potential market reversals. Whether you\'re a seasoned trader or a beginner, this comprehensive guide will equip you with the skills to interpret charts and make well-informed trading decisions based on technical insights.';
        $post->img = null;
        $post->save();

        $post = new Post();
        $post->title = 'Risk Management: Safeguarding Your Forex Investments';
        $post->body = 'Risk management is the backbone of profitable forex trading. This post emphasizes the significance of implementing a robust risk management strategy to protect your capital and maintain steady growth. We delve into position sizing, setting stop-loss orders, and understanding leverage, empowering traders to minimize potential losses and optimize risk-to-reward ratios. Learn how to stay disciplined, protect your investments, and preserve your trading account for sustained success in the dynamic forex market.';
        $post->img = null;
        $post->save();
    }
}
