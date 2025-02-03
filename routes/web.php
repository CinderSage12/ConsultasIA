<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/redirect', function (Request $request) {
//     $request->session()->put('state', $state = Str::random(40));

//     $query = http_build_query([
//         'client_id' => '3',
//         'redirect_uri' => 'http://localhost/auth/callback',
//         'response_type' => 'code',
//         'scope' => '',
//         'state' => $state,
//         // 'prompt' => '', // "none", "consent", or "login"
//     ]);

//     return redirect('http://localhost:8000/oauth/authorize?'.$query);
// });