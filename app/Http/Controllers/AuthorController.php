<?php
namespace App\Http\Controllers;
use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
// FIND Authors
public function showAllAuthors()
{
    return response()->json(Author::all());
}
public function ShowOneAuthor($id)
{
    return response()->json(Author::find($id));
}
// CRUD Authors
public function createAuthor(Request $request)
{
    $author = Author::create($request->all());
    return response()->json($author, 201);
}
public function updateAuthor($id, Request $request)
{
    $author = Author::findOrFail($id);
    $author->update($request->all());
    return response()->json($author, 200);
}
public function deleteAuthor($id)
{
    Author::findOrFail($id)->delete();
    return response('Deleted Successfully', 200);
}

}