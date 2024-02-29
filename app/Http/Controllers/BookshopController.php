<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Bookshop;

class BookshopController extends Controller
{
    public function list()
    {
        $bookshops = Bookshop::get();
        return view('bookshop.list', compact('bookshops'));
    }

    public function getDetails($id)
    {
        $bookshop = Bookshop::with('books')->findOrFail($id);

        return view('bookshop.details', compact('bookshop'));
    }
}
