<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

// Route::get('/redirect', function () {

//     $query = http_build_query([
//         'client_id' => env('GITHUB_OAUTH_CLIENT_ID'),
//         'redirect_uri' => env('OAUTH_CLIENT_CALLBACK'),
//         'response_type' => 'code',
//         'scope' => ''
//     ]);

//     return redirect(env('APP_URL').'/oauth/authorize?'.$query);
// });

// Route::get('/callback', function (Illuminate\Http\Request $request) {
//     $http = new \GuzzleHttp\Client;

//     $response = $http->post(env('APP_URL').'/oauth/token', [
//         'form_params' => [
//             'client_id' => env('GITHUB_OAUTH_CLIENT_ID'),
//             'client_secret' => env('GITHUB_OAUTH_CLIENT_SECRET'),
//             'grant_type' => 'authorization_code',
//             'redirect_uri' => env('OAUTH_CLIENT_CALLBACK'),
//             'code' => $request->code,
//         ],
//     ]);
//     return json_decode((string) $response->getBody(), true);
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/client-data', 'ClientDataController@index')->name('client-data');

Route::get('/api/ProduceFormly', array('middleware' => 'cors', 'uses' => function () {
    // send some test data to our PWA (need to use GUIDs or something for working with )
    $rArray = [];
    $v1="9065e639-1dc9-4e04-a9df-52cef0def13a"; //Str::orderedUuid();
    $v2="9065e639-250a-4907-a174-6ba598ac2adb";
    $v3="9065e639-27b9-4701-9ea3-30e2726eedb7";
    $rArray["api"]["config"]["id"] = "1"; // keep this simple for linking the data to a specific form and api version
    $rArray["api"]["config"]["name"] = "ProduceFormly";
    $rArray["api"]["config"]["version"] = "1.0";
    $rArray["api"]["config"]["description"] = "svelte2 PWA testing against Laravel data API with Svelte Formly dynamic form generator configuration";
    $rArray["api"]["data"] = preg_replace("/\r|\n/", "", <<<MLS
[
{
"uuid":"$v1",
"name": "banana",
"price": "$2.99",
"description": "It is a purple banana!",
"created": "1587617844320",
"apiid":"1"
},
{
"uuid":"$v2",
"name": "apple",
"price": "$0.99",
"description": "Mac",
"created": "1587617844321",
"apiid":"1"
},
{
"uuid":"$v3",
"name": "kale",
"price": "$0.01",
"description": "Free",
"created": "1587617844322",
"apiid":"1"
}
]
MLS);
    $rArray["api"]["config"]["fields"] = preg_replace("/\r|\n/", "", <<<MLS
[
{
"type":"text",
"name":"name",
"label":"Produce name:",
"value":"",
"id":"name",
"class":[
"form-control"

],
"placeholder":"Enter name of produce",
"validation":[
"required"

],
"messages":{
"required":"Produce name field is required!"

},
"description":{
"class":[
"custom-class-desc"

]

}

},
{
"type":"text",
"name":"price",
"label":"Price:",
"value":"",
"id":"price",
"class":[
"form-control"

],
"placeholder":"Enter produce price",
"validation":[
"required"

],
"messages":{
"required":"Price is required!"

},
"description":{
"class":[
"custom-class-desc"

]

}

},
{
"type":"text",
"name":"description",
"label":"Produce description:",
"value":"",
"id":"name",
"class":[
"form-control"

],
"placeholder":"Enter produce description",
"validation":[
"required"

],
"messages":{
"required":"Description field is required!"

},
"description":{
"class":[
"custom-class-desc"

]

}

}
]
MLS);
// return a JSON response with appropriate headers and status
return response()->json($rArray,200);
}));
