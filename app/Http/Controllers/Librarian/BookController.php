<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Genre;
use App\Book;

class BookController extends Controller
{
     public function __construct()
    {
    $this->middleware('role:librarian');
    }

    public function index()
    {
        $user = Auth::user()->id;
        $category = Genre::all();
        $book_list = Book::where('user_id', $user)->get();

        return view('librarian.bookmanagement', ['books' => $book_list, 'genre' => $category]);
    }
    public function addbook(Request $request)
    {
        $user = Auth::user();
         $rules = [
                'bookname' => 'required|unique:books,book_name,',
                'book_quantity' => 'required',
                'description' => 'required',
                'genre' => 'required',
                'author' => 'required',
                'publisher' => 'required',
                'datepublished' => 'required',
            ];

        $book = new Book;

        if ($request->has('book_image')) {
            $rules['book_image'] = 'mimes:jpeg,jpg,png,gif|required|max:2048';
        }

        $this->validate($request, $rules);

        if ($request->has('book_image')) {
             $time = time();
             $destination =  public_path() . '/images/book_images/' . $time .'_' .  str_replace(' ', '_', $request->file('book_image')->getClientOriginalName());
             $imageName = $time . '_' . $request->file('book_image')->getClientOriginalName();
             move_uploaded_file($request->file('book_image'), $destination);
        }

        if ($request->has('book_image') && $imageName) {
            $book->image_url = $imageName;
        }

        $book->book_name = $request->bookname;
        $book->book_quantity = $request->book_quantity;
        $book->book_description = $request->description;
        $book->genre_id = $request->genre;
        $book->book_author = $request->author;
        $book->book_publisher = $request->publisher;
        $book->date_published = $request->datepublished;
        $book->book_uploader = $user->name;
        $user->books()->save($book);
        return back()->with('success', 'Successfully added new book.');
    }
    public function editBook()
    {
        $show_editBook = Book::all();

        return view('librarian.bookmanagement' , ['books' => $show_editBook]);
    }
    // Edit Book
     public function editBookList(Request $request)
    {
        $rules = [
                'edit_bookname' => 'required',
                'edit_book_quantity' => 'required',
                'edit_description' => 'required',
                'edit_genre' => 'required',
                'edit_author' => 'required',
                'edit_publisher' => 'required',
                'edit_datepublished' => 'required',
            ];

        $book = new Book;

        if ($request->has('book_image')) {
            $rules['book_image'] = 'mimes:jpeg,jpg,png,gif|required|max:2048';
        }

        $this->validate($request, $rules);

        if ($request->has('book_image')) {
             $time = time();
             $destination =  public_path() . '/images/book_images/' . $time .'_' .  str_replace(' ', '_', $request->file('book_image')->getClientOriginalName());
             $imageName = $time . '_' . $request->file('book_image')->getClientOriginalName();
             move_uploaded_file($request->file('book_image'), $destination);
        }

        $book = [
                'book_name' => $request->edit_bookname,
                'book_quantity' => $request->edit_book_quantity,
                'book_description' => $request->edit_description,
                'genre_id' => $request->edit_genre,
                'book_author' => $request->edit_author,
                'book_publisher' => $request->edit_publisher,
                'date_published' => $request->edit_datepublished,
            ];

            if ($request->has('book_image') && $imageName) {
                $book['image_url'] = $imageName;
            }

            $editBookupdate = Book::where ('id',  $request->book_id)->update($book);
        return back()->with('success', 'Successfully book updated.');
    }
     // Delete Book
    public function deleteBook($book_id)
    {
        Book::where ('id',  $book_id)->delete();
        return back()->with('success', 'Successfully deleted book.');
    }
}
