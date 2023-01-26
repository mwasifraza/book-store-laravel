<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AddBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use App\Models\Book;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard', ['user' => Auth::user()]);
    }


    // books
    public function all_books(){
        return view('admin.books', ['books' => Book::all()]);
    }

    public function add_book(){
        return view('admin.book-add-update', [
            'title' => 'Add a New Book',
            'btn' => 'Add Book',
            'action' => route('admin.book.add.action'),
            'categories' => Category::all()
        ]);
    }

    public function add_book_action(AddBookRequest $request){
        $bookname = "book".date("YmdHis").'.'.$request->file('cover')->extension();
        if($path = $request->file('cover')->storeAs('public/', $bookname)){
            $request->merge(['cover_photo' => "storage/{$bookname}"]);
            $book = Book::create($request->except('cover'));

            // if ($old_avatar !== "storage/user.png") {
            //     unlink($old_avatar);
            // }

            return redirect()->route('admin.books.page', ['msg' => 'new book added']);
        }
    }

    public function update_book($id){
        return view('admin.book-add-update', [
            'title' => 'Update Book',
            'btn' => 'Update Book',
            'action' => route('admin.book.update.action', ['id' => $id]),
            'categories' => Category::all(),
            'book' => Book::findOrFail($id),
        ]);
    }

    public function update_book_action(UpdateBookRequest $request, $id){
        if(!empty($request->cover)){
            $bookname = "book".date("YmdHis").'.'.$request->file('cover')->extension();
            if($path = $request->file('cover')->storeAs('public/', $bookname)){
                unlink($request->cover_photo);
                $request->merge(['cover_photo' => "storage/{$bookname}"]);
            }
        }
        Book::find($id)->update($request->except('cover'));
        return redirect()->route('admin.books.page', ['msg' => 'book has been updated']);
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
            'category' => Category::findOrFail($id)
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
