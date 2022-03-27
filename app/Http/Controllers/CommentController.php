<?php
namespace App\Http\Controllers;
use App\Comment;
use App\Book;
use Illuminate\Http\Request;

class CommentController extends Controller
{


// FIND Comment
public function showAllComments()
{
    return response()->json(Comment ::orderBy('created_at','desc')->get());
}

public function ShowOneComment($id)
{
    return response()->json(Comment::find($id));
}

// CRUD Comments
public function createComment($book_id, Request $request)
{
    //get ip addres 
    $ip_address = $request->ip();

    $book = Book ::find($book_id);
    $Comment = Comment::create([
        'comment' => $request->comment,
        'book_id' => $book->id,
        'ip_address' => $ip_address
    ]);
    return response()->json($Comment, 201);
}

public function updateComment($id, Request $request)
{
    //get ip addres 
    $ip_address = $request->ip();
    
    $Comment = Comment::findOrFail($id);
    $Comment->update([
        'comment' => $request->comment,
        'book_id' => $Comment->book_id,
        'ip_address' => $ip_address
    ]);
    return response()->json($Comment, 200);
}

public function deleteComment($id)
{
    Comment::findOrFail($id)->delete();
    return response('Deleted Successfully', 200);
}


}