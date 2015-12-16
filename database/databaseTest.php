<?php

require '../models/Post.php';
require '../models/User.php';

$user = new User();

$post = new Post();

$user->username = 'woot';
$user->password = 'shawn';
$user->email = 'shawn';
$user->age = 1;

$post->business_type = 'for sald today';
$post->user_id = 2;
$post->title = 'funny';
$post->price = 23.34;
$post->zip = 73648;
$post->category = 'woeiur';
$post->description = 'lalalal';


// echo $user->getKeyString();
$post->save();
// $user->save();
// $user->phone  = 'loopty loo';
// $user->save();

// echo $user->id;


// $new = new GenaricTable('name','date');
// echo $new->attributes['namsde'];

// print_r(User::all());
//User::delete(6);

// print_r(User::find(12));

