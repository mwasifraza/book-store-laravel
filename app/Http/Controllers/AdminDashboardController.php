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

    public function add_category(){
        return view('admin.category-add-update', [
            'title' => 'Add a New Category',
            'btn' => 'Add Category',
            'action' => route('admin.category.add.action'),
        ]);
    }

    public function add_category_action(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        $category = Category::create($request->all());
        return redirect()->route('admin.categories.page', ['msg' => 'new category added']);
    }

    public function update_category($id){
        return view('admin.category-add-update', [
            'title' => 'Update Category',
            'btn' => 'Update Category',
            'action' => route('admin.category.update.action', ['id' => $id]),
            'category' => Category::find($id)
        ]);
    }

    public function update_category_action(Request $request, $id){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,'.$id,
        ]);

        $category = Category::find($id)->update($request->all());
        return redirect()->route('admin.categories.page', ['msg' => 'category updated']);
    }

    public function remove_category_action($id){
        $category = Category::find($id)->delete();
        return redirect()->route('admin.categories.page', ['msg' => 'category deleted']);
    }


    // users
    public function users(){
        return view('admin.users', ['user' => Auth::user()]);
    }
}
