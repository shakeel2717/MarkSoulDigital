<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
