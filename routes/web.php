<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});


// Users
$router->get('/users', 'UserController@index');
$router->get('/users/{id}', 'UserController@show');
$router->post('/users', 'UserController@store');

// Posts
$router->get('/posts','PostController@index');
$router->get('/posts/{id}','PostController@show');

// Comments
$router->get('/comments', 'CommentController@index');
$router->get('/comments/{id}', 'CommentController@show');
$router->get('/posts/{post_id}/comments/{comment_id}', 'PostCommentController@show'); // Alias of '/comments/{id}'

// Comments of a Post
$router->get('/posts/{post_id}/comments', 'PostCommentController@index');

/**
 * Auth middleware routes
 */
$router->group(['middleware' => 'auth'], function() use($router){

	// Posts
	$router->post('/posts','PostController@store');
	$router->put('/posts/{id}', 'PostController@update');
	$router->delete('/posts/{id}', 'PostController@destroy');

	// Users
	$router->put('/users/{id}', 'UserController@update');
	$router->delete('/users/{id}', 'UserController@destroy');

	// Comments
	$router->post('/posts/{post_id}/comments', 'PostCommentController@store');
	$router->put('/posts/{post_id}/comments/{comment_id}', 'PostCommentController@update');
	$router->delete('/posts/{post_id}/comments/{comment_id}', 'PostCommentController@destroy');

});