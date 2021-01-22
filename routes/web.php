<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicMailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/',function(){
	return view('send_mail');
})->name('sendmail.index');

Route::get('/send-basic-email', [BasicMailController::class, 'basic_email'])->name('sendmail.basic');
Route::get('/send-html-email', [BasicMailController::class, 'html_email'])->name('sendmail.html');
Route::get('/send-attachment-email', [BasicMailController::class, 'attachment_email'])->name('sendmail.attachment');



Route::get('/check-with-mailer', [BasicMailController::class, 'check_with_mailer']);
Route::get('/check-dynamic-mailer', [BasicMailController::class, 'check_dynamic_mailer'])->name('sendmail.dynamic.check');


Route::get('email-test-with-quee', function(){

  

    $details['email'][0] = 'drimik2010@gmail.com';
    $details['email'][1] = 'nh.limon2010@gmail.com';
    $details['email'][2] = 'tech.antopolis@gmail.com';

    $details['limon'][0] = 'drimik2010@gmail.com';
    $details['limon'][1] = 'nh.limon2010@gmail.com';
    $details['limon'][2] = 'tech.antopolis@gmail.com';
    $encoded_details= json_encode($details);
    // // dd($encoded_details->limon);
    // foreach ($encoded_details['email'] as $encoded_detail) {
    // 	# code...
    // 	dd($encoded_detail);
    // }
    // // dd($encoded_details);
    // foreach ($details['email'] as $det) {
    // 	// dd($det);
    // 	echo $det;
    // }
    // dd($details);

  

    dispatch(new App\Jobs\CheckMailJob($details));

  

    // dd('done');

})->name('sendmail.jobs_and_queue');


