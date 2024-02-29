<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Review;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::limit(10)
            ->with('authors')
            ->get();

        // // .....
        // if ($some_condition) {
        //     $books->load('publishers');
        // }
        
        return view('books.index', compact('books'));
    }

    // public function create()
    // {
    //     $categories = Category::get();
        
    //     $book = new Book;

    //     return view('admin.books.edit', compact('categories', 'book'));
    // }

    public function edit($id = null)
    {
        $categories = Category::get();

        if ($id) {
            $book = Book::findOrFail($id);
        } else {
            $book = new Book;
        }

        return view('books.edit', compact('categories', 'book'));
    }

    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'slug' => 'required'
        ]);
        
        if ($id) {
            $book = Book::findOrFail($id);
        } else {
            $book = new Book;
        }

        $book->slug = $request->input('slug');
        $book->category_id = $request->input('category_id');
        $book->title = $request->input('title');
        $book->price = $request->input('price');
        $book->save();

        return redirect()->back()->with('success_message', 'Book data saved');
    }
    
    public function deleteReview($book_id, $id)
    {
        $review=Review::findOrFail($id)->delete();
        session()->flash('success_message', "Review has been deleted!");
        return redirect()->back();
    }
}