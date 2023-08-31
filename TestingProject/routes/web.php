<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\NewController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function (){
    return view('welcome');
})->name('home');

Route::get('/home', [FirstController::class, 'showCorrectPage']);
// FirstController Routes
// Route::get('/',[FirstController::class,'showCorrectPage']);
Route::post('sent',[FirstController::class,'storeInDb']);
Route::get('list',[FirstController::class,'retrieveFromDb']);
Route::get('login', function () {return view('welcome');})->name('login');
Route::post('login',[FirstController::class,'login']);
Route::get('test',function(){
    return view('logged-in');
});
Route::get('logout',function(){
    return view('welcome');})                               ->name('logout');

Route::post('logout',[FirstController::class,'logout'])     ->name('welcome');

 // Routes that can be accessed only when authenticated 

Route::middleware('auth')->group(function () {
Route::get('view1',function(){
    return view('all-views.view1');
});
Route::get('view2',function(){
    return view('all-views.view2');
});
Route::get('view3',function(){
    return view('all-views.view3');
});
Route::get('view4',function(){
    return view('all-views.view4');
});
Route::get('view5',function(){
    return view('all-views.view5');
});
Route::get('dashboard',[NewController::class,'getPosts'])     ->name('dashboard');


});


// NewController Routes 
//INFO : LARAVEL tries to look by the id id inside {wildcard} it has an element that has not a declared thing {x:username}
Route::get('create-post',function(){
    return view('all-views.make-post');
});
Route::post('create-post',[NewController::class,'createPost']);
Route::get('/posts/{postId}', [NewController::class, 'postData']);

Route::get('/profile/{userId}',[NewController::class,'showProfile']);



//RETURN POSTS BY CATEGORY
Route::get('/categories/{cat:slug}', function (Category $cat) {
    $posts = $cat->postsCat()->get();
    return view('all-views.posts2', ['posts' => $posts, 'category' => $cat]);
});