<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
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
        $category = Genre::all();
        $book_list = Book::all();

        return view('librarian.bookmanagement', ['books' => $book_list, 'genre' => $category]);
    }
    public function addbook(Request $request)
    {
        $data = request()->validate([
            'bookname' => ['required',''], 
            'book_quantity' => ['required',''], 
            'description' => ['required',''],
            'genre' => ['required',''],
            'author' => ['required',''],
            'publisher' => ['required',''],
            'datepublished' => ['required',''],
            'image' => ['required','image'],
        ]);

            $image_path = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$image_path}"))->fit(200, 300);
            $image->save();
            $book = Book::Create([
                'book_name' => $data['bookname'],
                'book_quantity' => $data['book_quantity'],
                'book_description' => $data['description'], 
                'genre_id' => $data['genre'],
                'book_author' => $data['author'],
                'book_publisher' => $data['publisher'],
                'date_published' => $data['datepublished'],
                'image_url' => $image_path,
            ]);
            $book->save();

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
       $data = request()->validate([
            'edit_bookname' => ['required',''], 
            'edit_book_quantity' => ['required',''], 
            'edit_description' => ['required',''],
            'edit_genre' => ['required',''],
            'edit_author' => ['required',''],
            'edit_publisher' => ['required',''],
            'edit_datepublished' => ['required',''],
            'edit_image' => ['required','image'],
        ]);
            $image_path = request('edit_image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$image_path}"))->fit(200, 300);
            $image->save();

            $editBooks = array(
            'book_name' => $request->edit_bookname,
            'book_quantity' => $request->edit_book_quantity,
            'book_description' => $request->edit_description,
            'genre_id' => $request->edit_genre,
            'book_author' => $request->edit_author,
            'book_publisher' => $request->edit_publisher,
            'date_published' => $request->edit_datepublished,
            'image_url' => $image_path);

        $editBookupdate = Book::where ('id',  $request->book_id)->update($editBooks);
        return back()->with('success', 'Successfully book updated.');
    }
     // Delete Book
    public function deleteBook($book_id)
    {
        Book::where ('id',  $book_id)->delete();
        return back()->with('success', 'Successfully deleted book.');
    }
}
