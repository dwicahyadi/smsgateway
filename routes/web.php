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

use Illuminate\Support\Facades\DB;

$router->get('/', function () {
    return [
      'modem' => DB::table('phones')->get(['ID','UpdatedInDB','Signal','Sent']),
      'outbox' => DB::table('outbox')->get(['InsertIntoDB','DestinationNumber','TextDecoded','SenderID','Status'])
    ];
});


$router->post('/', function (){
    $sender = DB::table('phones')->inRandomOrder()->first();

    if (!$sender)
        return ['status'=>'fail','msg'=>'tidak ada sender tersedia'];

    DB::table('outbox')->insert([
        'DestinationNumber' => request('destination'),
        'TextDecoded' => request('msg'),
        'SenderID' => $sender->ID,
        'CreatorID' => 'gammu'
    ]);

    return ['status'=>'success','msg'=>'pesan berhasil disimpan'];


});
