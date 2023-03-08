<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\{
    BookCategory,
    Category,
    Book,
    User,
};

class AdminDashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard', [
            'total_user' => User::all()->count(),
            'verified_user' => User::where('email_verified_at', '!=', Null)->get()->count(),
            'total_book' => Book::all()->count(),
            'total_category' => Category::all()->count(),
        ]);
    }


    // books
    public function all_books(){
        return view('admin.books', ['books' => Book::latest()->paginate(7)]);
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
            foreach($request->categories as $category){
                BookCategory::create(['book_id' => $book->id, 'category_id' => $category]);
            }
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

    public function remove_book_action($id){
        // delete categories
        $book_category = BookCategory::where('book_id', $id)->delete();
        // delete book
        $book = Book::find($id);
        unlink($book->cover_photo);
        $book->delete();
        return redirect()->route('admin.books.page', ['msg' => 'book deleted']);
    }


    // category
    public function all_categories(){
        return view('admin.categories', ['categories' => Category::latest()->paginate(7)]);
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
        $category = Category::find($id);
        if(count($category->books) > 0){
            return redirect()->route('admin.categories.page', ['msg' => 'category cannot be deleted']);
        }else{
            $category->delete();
            return redirect()->route('admin.categories.page', ['msg' => 'category deleted']);
        }
        
    }


    // users
    public function users(){
        return view('admin.users', ['users' => User::paginate(7)]);
    }
}