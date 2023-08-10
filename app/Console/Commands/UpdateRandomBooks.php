<?php

namespace App\Console\Commands;

use App\Models\Book;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UpdateRandomBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-random-books';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // if (Auth::check()) {
        //     $userData = Auth::user();
        //     $randomBooks = Book::where('category', $userData->favorite_book_genre)
        //         ->inRandomOrder()
        //         ->take(4)
        //         ->get();
        //     Cache::put('random_books', $randomBooks, now()->addMinutes(1));
        // }
    }
}
