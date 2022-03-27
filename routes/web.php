<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);
  
    $router->get('authors/{id}', ['uses' => 'AuthorController@ShowOneAuthor']);
  
    $router->post('authors', ['uses' => 'AuthorController@createAuthor']);
  
    $router->delete('authors/{id}', ['uses' => 'AuthorController@deleteAuthor']);
  
    $router->put('authors/{id}', ['uses' => 'AuthorController@updateAuthor']);


  });


  // CHARACTER

  $router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('characters',  ['uses' => 'CharacterController@showAllCharacters']);
  
    $router->get('characters/{id}', ['uses' => 'CharacterController@ShowOneCharacter']);

    // order by name, gender, age
    $router->get('characters/{sort_by}/{order_by}', ['uses' => 'CharacterController@showAllCharactersSorting']);

      // filter not working for now
      $router->get('characters/gender/{filter_by}', ['uses' => 'CharacterController@showAllCharactersFilter']);
  
    $router->post('books/{book_id}/characters', ['uses' => 'CharacterController@createCharacter']);
  
    $router->delete('characters/{id}', ['uses' => 'CharacterController@deleteCharacter']);
  
    $router->put('characters/{id}', ['uses' => 'CharacterController@updateCharacter']);


  });


    // COMMENTS

    $router->group(['prefix' => 'api'], function () use ($router) {

      $router->get('comments',  ['uses' => 'CommentController@showAllComments']);
    
      $router->get('comments/{id}', ['uses' => 'CommentController@ShowOneComment']);
    
      // $router->post('/comments', ['uses' => 'CommentController@createComment']);

      // create a comment by adding the book_id in the url 
      $router->post('books/{book_id}/comments', ['uses' => 'CommentController@createComment']);
    
      $router->delete('comments/{id}', ['uses' => 'CommentController@deleteComment']);
    
      $router->put('comments/{id}', ['uses' => 'CommentController@updateComment']);
  
  
    });


      // BOOKS

      $router->group(['prefix' => 'api'], function () use ($router) {

        $router->get('books',  ['uses' => 'BookController@showAllBooks']);

        $router->get('authors/{author_id}/books',  ['uses' => 'BookController@showAllBooksFromAuthor']);
      
        $router->get('books/{id}', ['uses' => 'BookController@ShowOneBook']);
      
        $router->post('/books', ['uses' => 'BookController@createBook']);

        // create book by adding the author_id in the url 
        $router->post('authors/{author_id}/books', ['uses' => 'BookController@createBook']);
      
        $router->delete('books/{id}', ['uses' => 'BookController@deleteBook']);
      
        $router->put('books/{id}', ['uses' => 'BookController@updateBook']);
    
    
      });


  // $router->get('/characters', ['uses' => 'AuthorController@showAllCharacters']);
  // $router->post('/characters', ['uses' => 'CharacterController@createCharacter']);

  

