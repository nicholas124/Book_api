<?php
namespace App\Http\Controllers;
use App\Character;
use App\Book;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    
// FIND Character
public function showAllCharacters()
{
    return response()->json((Character::all()));
}

public function showAllCharactersSorting($sort_by, $order_by)
{
    return response()->json((Character::orderBy($sort_by,$order_by)->get()), 201);
}

public function showAllCharactersFilter($filter_by)
{
    return response()->json((Character::where('gender',$filter_by)->get() ));
}

public function ShowOneCharacter($id)
{
    return response()->json(Character::find($id));
}


// CRUD Characters
public function createCharacter($book_id,Request $request)
{
    $book = Book ::find($book_id);
    $character = Character::create([
        'name' => $request->name,
        'gender' => $request->gender,
        'culture' => $request->culture,
        'born' => $request->born,
        'died' => $request->died,
        'title' => $request->title,
        'book_id' => $book->id

    ]);
    return response()->json($character, 201);
}

public function updateCharacter($id, Request $request)
{
    $character = Character::findOrFail($id);
    $character->update($request->all());
    return response()->json($character, 200);
}

public function deleteCharacter($id)
{
    Character::findOrFail($id)->delete();
    return response('Deleted Successfully', 200);
}

}