<?php

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
use App\Events\MessagePushed;
use Illuminate\Support\Facades\Redis;


Route::get('/', function () {
    Redis::set('name', 'Bruno');
    echo 'Oi testando echo server'."<br>";
    $nomeAnimal = Redis::get('name');
    echo 'Nome vindo do Redis -> '.$nomeAnimal."<br>";
    $data =[
		'event' => 'agent',
		'data' =>[
			'username' => 'Brunin Pignatari'
		]
    ];
    // print_r($data);
    event(
        (new MessagePushed($data))
    );


    // return view('welcome');
});
Route::get('/teste', function () {
    return view('teste');
    

    
    // return view('welcome');
});


