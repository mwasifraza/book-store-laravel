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
            $books = Book::where('category', $request->cat)->paginate(5);
        }else{
            $books = Book::paginate(5);
        }
        return view('dashboard', [
            'books' => $books,
            'categories' => Category::all(),
        
        ]);
    }
}
