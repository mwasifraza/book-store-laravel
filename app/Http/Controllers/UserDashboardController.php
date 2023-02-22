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
        if(isset($request->cat)){
            $books = Book::where('category', $request->cat)->latest()->paginate(5)->withQueryString();
        }else{
            $books = Book::latest()->paginate(5);
        }
        return view('dashboard', [
            'books' => $books,
            'categories' => Category::all(),
        
        ]);
    }
}
