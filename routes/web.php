<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/', function(){
    $links= \App\Models\Link::all();
    // return view('welcome', ['links'=>$links]);
    return view('welcome')->with('links', $links);
});

Route::get('link/{id}', function($id){
    $link= \App\Models\Link::find($id);
    return view('link')->with('link', $link);
});

Route::get('/submit', function(){
    return view('submit');
});

Route::post('/submit', function(Request $request){
    $data = $request->validate([
        'title'=>'required|max:255',
        'url'=> 'required|url|max:255',
        'description'=>'required|max:255'
    ]);

    $link = tap(new App\Models\Link($data))->save();

    return redirect('/');

    // Typically, you would have to do the following without tap, it just adds a little syntactic sugar:

    //    $link = new \App\Link($data);
    //    $link->save();
    //
    //    return $link;
});


require __DIR__.'/auth.php';
