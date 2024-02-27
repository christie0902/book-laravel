<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Review;
use Auth;

use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function create($book_id, Request $request)
    {
        $this->validate($request, [
            'review' => 'required|string|min:20|max:255',
        ], [
            'review.required' => "You must enter the review",
            'review.string' => "The review must be a string",
            'review.min' => "The review must be at least 20 characters long",
            'review.max' => "The review must not be longer than 255 characters"
        ]);

        $data= $request->all();
        
        $review = new Review;
        $review->book_id = $book_id;
        $review->text = $data['review'];
        $review->user_id = Auth::id();

        $review->save();

        session()->flash('success_message', "Your review has been saved!");
        return redirect()->route('book.details',['book_id' => $book_id]);
    }
}
