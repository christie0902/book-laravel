<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->query('search');

        $books = Book::where('title', 'like', "%{$search}%")
            ->limit(5)
            ->get();

        return $books;
    }
}
