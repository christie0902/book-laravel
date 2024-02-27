<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function display()
    {
        $books = Book::orderBy("publication_date", "asc")
            ->where("language", "!=", "")
            ->where('description', '!=', '')
            ->limit(10)
            ->get();
        return view("books.display", compact("books"));
    }

    public function getDetail($id)
    {
        $book = Book::with('reviews.user')->findOrFail($id);
        return view('books.detail', compact('book'));
    }
}
