<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(Request $request){
        $books = Book::from('books as b')
        ->select('b.*')
        ->when($request->has('cat'), function($q){
            $q->join('book_category as bc', 'bc.book_id', '=', 'b.id')
              ->where('bc.category_id', request('cat'));
        })
        ->latest()->paginate(5)->withQueryString();

        return view('dashboard', [
            'books' => $books,
            'categories' => Category::all(),
        ]);
    }
}