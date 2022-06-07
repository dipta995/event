<?php

use App\Http\Controllers\Backend\ChannelController;
use App\Http\Controllers\Backend\ChannelPostController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Livewire\ChannelCreate;
use App\Http\Livewire\ChannelPaymentComponent;
use App\Http\Livewire\ChannelPostComponent;
use App\Http\Livewire\Dropdowns;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MyPackageOrderComponent;
use App\Http\Livewire\PackageComponent;
use App\Http\Livewire\PackageDetailsComponent;
use App\Http\Livewire\PackagePaymentComponent;
use App\Http\Livewire\PackagesForChannel;
use App\Http\Livewire\PostComponent;
use App\Http\Livewire\RattingComponent;
use App\Http\Livewire\ViewchannelComponent;
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
Route::group(['prefix' => 'admin'], function () {
    Route::get('/',[DashboardController::class,'index'])->name('home');
    Route::resource('roles', RolesController::class,['names'=>'admin.roles']);
    Route::resource('users', UserController::class,['names'=>'admin.users']);
    Route::resource('customers', CustomerController::class,['names'=>'admin.customers']);
    Route::resource('channels', ChannelController::class,['names'=>'admin.channels']);
    Route::resource('channle-posts', ChannelPostController::class,['names'=>'admin.channel.posts']);
    Route::resource('packages', PackageController::class,['names'=>'admin.packages']);

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::group(['middleware'=>['auth:sanctum','verified','auth',]],function(){
    Route::get('/', HomeComponent::class);

    Route::get('/channel/create', ChannelCreate::class);
    Route::get('channel/{slug}', ViewchannelComponent::class);
    Route::get('channel/payment/{userid}', ChannelPaymentComponent::class);
    Route::get('post/{slug}', PostComponent::class);
    Route::get('/packages', PackageComponent::class);
    Route::get('package/{slug}', PackageDetailsComponent::class);
    Route::get('packages/{id}', MyPackageOrderComponent::class);
    Route::get('package/ratting/{id}', RattingComponent::class);
    Route::get('package/payment/{id}', PackagePaymentComponent::class);
    Route::get('channel-package/{slug}', PackagesForChannel::class);
    Route::get('/test1', Dropdowns::class);



});
