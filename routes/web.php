<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
use App\Mail\NewUserWelcomeMail;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
// Routes for logged-in users
Route::group(['middleware' => ['auth']], function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/a/{user}', [App\Http\Controllers\ProfileController::class, 'cPass']);//->name('profile.password');
Route::get('/b/index', [App\Http\Controllers\ProfileController::class, 'cProfilE']);//->name('profile.index'); // view profiles
Route::get('/c/edit', [App\Http\Controllers\ProfileController::class, 'cEdit']);//->name('profile.edit');

// NOTE:: Create must come before Post

// POST/Create
Route::get('/f/post', [App\Http\Controllers\PostsController::class, 'pCreate']);//->name('post.create'); // in a new dir 'post'

// HOW THE POST/DATA WILL BE HANDLED
Route::post('/f', [App\Http\Controllers\PostsController::class, 'store']);//->name('post.create'); // in a new dir 'post'
//  /f ==> from the form action  <form method="POST" action="/f" enctype="multipart/form-data" method="post">

Route::get('/g/', [App\Http\Controllers\ProfileController::class, 'cShow']);//->name('profile.show');
//----------------------------------------------------- https://laravel.com/docs/5.1/controllers
// Actions Handled By Resource Controller

/**  UPDATE PROFILE
 * 1. if no profile == 0 redirect to profile.update.php
 * 2. if Profile count is available display profile.index.php
 * 3. Route::post()  ** NOTE used to populate an empty table
 * 4. Route::patch  -- used to update and existing table
 *  */    

 Route::get('/h', [App\Http\Controllers\ProfileController::class, 'cUpdate']);//->name('profile.update');
 //  FORM ACTION is PUT/PATCH method for update
 Route::patch('/i', [App\Http\Controllers\ProfileController::class, 'update']);

 // DELETE A POST
 //  FORM ACTION TO PULL A POST:: Route::get('/j/{post}' = because we need to use the 'id' to do this action
 Route::get('/j/{posts}', [App\Http\Controllers\ProfileController::class, 'cPost2D']);  // <a href="/j/{{ $post->id }}"> is ancoured in the show.blade.php image tag
 //using ProfileController because the post is stored in the profile. any controller can work but writting eloquent querries matters

 Route::delete('/k/{posts}', [App\Http\Controllers\ProfileController::class, 'cDelete']);


// DEMO EMAIL
Route::get('/e/mail', [App\Http\Controllers\MailController::class, 'cMail'])->name('send.mail');

Route::post('/l', [App\Http\Controllers\MailController::class, 'sendEmail']);//->name('profile.mail');
//Route::get('send-mail', [App\Http\Controllers\MailController::class, 'index']);

/**  We can use this link to temperarouly see the email template by visiting http://127.0.0.1:8000/email
 * Route::get('/email', function () {
 *   return new NewUserWelcomeMail();
 * });
 */

// TICKETS
Route::get('/d/tickets', [App\Http\Controllers\TicketsController::class, 'cTickets']);
// Buy the Ticket
Route::get('/buy', [App\Http\Controllers\TicketsController::class, 'bTickets']);
Route::post('/buy', [App\Http\Controllers\TicketsController::class, 'bTickets']);

Route::get('/checkout', [App\Http\Controllers\TicketsController::class, 'dTickets']);
Route::post('/checkout', [App\Http\Controllers\TicketsController::class, 'dTickets']);

// STRIPE
Route::get('stripe', [App\Http\Controllers\StripeController::class, 'stripePost']);
Route::post('stripe', [App\Http\Controllers\StripeController::class, 'stripePost'])->name('stripe.post');

});