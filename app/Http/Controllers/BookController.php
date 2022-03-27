<?php
namespace App\Http\Controllers;
use App\Book;
use App\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
// FIND Books
public function showAllBooks()
{
    return response()->json(Book::all());
}
public function ShowOneBook($id)
{
    return response()->json(Book::find($id));
}

public function showAllBooksFromAuthor($author_id)
    {
        try {
            $author = Author::findOrFail($author_id);
        } catch(ModelNotFoundException $e) {
            return response('Author not found', 404);
        }
            $books = $author->books;

            return response()->json($books, 200);

    }
// CRUD Books
//create book by inserting the authors id in the url
public function createBook($author_id, Request $request)
{
    $author = Author::find($author_id);
    $book = Book::create([
        'url' => $request->url,
        'name' => $request->name, 
        'isbn' => $request->isbn,
        'number_of_pages' => $request->number_of_pages, 
        'publisher' => $request->publisher,
        'country' => $request->country,
        'media_type' => $request->media_type,
        'released' => $request->released,
        'author_id' => $author->id,
        'character_id' => $request->character_id
    ]);
    return response()->json($book, 201);
}

public function updateBook($id, Request $request)
{
    $Book = Book::findOrFail($id);
    $Book->update($request->all());
    return response()->json($Book, 200);
}
public function deleteBook($id)
{
    Book::findOrFail($id)->delete();
    return response('Deleted Successfully', 200);
}

}