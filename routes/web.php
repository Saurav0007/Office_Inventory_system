<?php

use App\employee;
use App\empSelectedData;
use App\inventory;
use App\type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\type;

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

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/',function (){
    $emp = employee::all();
    $data = DB::select("select *,sum(stock) as total_stock from inventories group by  type");
    $value = type::all();
    return view('index',compact('data','value','emp'));
});
Route::get('/type',function(){
    return view('type');
});
Route::get('/employee',function(){
    $value = employee::all();
    return view('employee',compact('value'));
});
Route::get('/details',function(){
    $value = inventory::all();
    $value = employee::all();
    $value = empSelectedData::all();
    return view('details',compact('value'));
});

Route::Get('get-product-name-by-type','TypeController@getProductNameByType')->name('get-product-name-by-type');


Route::post('/submitForm',"InventoryController@inventoryDetails");
Route::post('/submitType',"TypeController@productType");
Route::post('/empForm',"EmployeeController@employeeData");
Route::post('/empSelect',"InventoryController@empDataSub");
Route::get('deleteData{id}',"InventoryController@delete");
Route::get('/get-details/{id}',"InventoryController@getDetails");