<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard', ['user' => Auth::user()]);
    }


    // books
    public function books(){
        return view('admin.books', ['user' => Auth::user()]);
    }


    // category
    public function all_categories(){
        return view('admin.categories', ['categories' => Category::all()]);
    }

    public function category(){
        return view('admin.category-add');
    }

    public function add_category(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        $category = Category::create($request->all());
        return redirect()->route('admin.categories.page', ['msg' => 'new category added']);
    }


    // users
    public function users(){
        return view('admin.users', ['user' => Auth::user()]);
    }
}
