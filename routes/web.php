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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'penjualan'], function () use ($router) {
    $router->get('/', function () {
        return response()->json([
            [
                "id"=> "1",
                "nomor"=> "SALE/001",
                "n_customer"=> "Bedul"
            ],
            [
                "id"=> "1",
                "nomor"=> "SALE/001",
                "n_customer"=> "Bedul"
            ],
            [
                "id"=> "1",
                "nomor"=> "SALE/001",
                "n_customer"=> "Bedul"
            ],
            [
                "id"=> "1",
                "nomor"=> "SALE/001",
                "n_customer"=> "Bedul"
            ],
            [
                "id"=> "1",
                "nomor"=> "SALE/001",
                "n_customer"=> "Bedul"
            ],
            [
                "id"=> "1",
                "nomor"=> "SALE/001",
                "n_customer"=> "Bedul"
            ],
        ]);
    });
    $router->get('/{id}', function ($id) {
        return response()->json(['Data' => [
            "id"=> "1",
            "nomor"=> "SALE/001",
            "n_customer"=> "Bedul",
            "domisili"=> "Kota Bekasi"
        ]]);
    });
    $router->post('/', function(){
        return response()->json([
            'msg'=> "berhasil",
            "id" => 4
        ]);
    });
    $router->put('/{id}', function (Request $request, $id) {
        $nomor = $request->input('nomor');
        $n_customer = $request->input('n_customer');
        return response()->json(['Data' => [
            "id"=> $id,
            "nomor"=> $nomor,
            "n_customer"=> $n_customer,
            "domisili"=> "Kota Bekasi"
        ]]);
    });
    $router->delete('/{id}', function ($id) {
        return response()->json(['msg' => "Berhasil dihapus"]);
    });
    $router->get('/{id}/confirm', function (Request $request, $id) {
        $user = $request->user();
        Log::debug($user);
        Log::debug("<<<<<<<<");
        if ($user == null) {
            return response()->json(['error' => 'Unauthorized'], 401, ['X-Header-One' => 'Header Value']);
        }
        return response()->json(['msg' => "Berhasil Konfirmasi"]);
    });
    $router->get('/{id}/send-email', ['middleware' => 'auth', function (Request $request, $id) {
        $user = $request->user();
        Mail::raw('This is the email body', function($message) {
            $message->to('hariagung1703@gmail.com')
            ->subject('Lumen Test Email');
        });
        return response()->json(['msg' => "Berhasil Kirim Email"]);
    }]);
});