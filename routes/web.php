<?php

use App\Http\Controllers\Backend\ChannelController;
use App\Http\Controllers\Backend\ChannelPaymentController;
use App\Http\Controllers\Backend\ChannelPostController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Livewire\ChannelCreate;
use App\Http\Livewire\ChannelPaymentComponent;
use App\Http\Livewire\ChannelPostComponent;
use App\Http\Livewire\Dropdowns;
use App\Http\Livewire\EditPostComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MyPackageOrderComponent;
use App\Http\Livewire\PackageComponent;
use App\Http\Livewire\PackageDetailsComponent;
use App\Http\Livewire\PackageOrderComponent;
use App\Http\Livewire\PackagePaymentComponent;
use App\Http\Livewire\PackagesForChannel;
use App\Http\Livewire\PostComponent;
use App\Http\Livewire\RattingComponent;
use App\Http\Livewire\ReportComponent;
use App\Http\Livewire\ViewchannelComponent;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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
Route::get('/storage-shortcut', function () {
    Artisan::call('storage:link');
});
// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
     Route::post('/logout/submit',[AuthenticatedSessionController::class,'destroy'])->name('logout.submit');
});
Route::get('remove-post-image/',[DashboardController::class,'removepostImage'])->name('removepostImage');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/',[DashboardController::class,'index'])->name('home');
    Route::resource('roles', RolesController::class,['names'=>'admin.roles']);
    Route::resource('users', UserController::class,['names'=>'admin.users']);
    Route::resource('reports', ReportController::class,['names'=>'admin.reports']);
    Route::resource('channel-payments', ChannelPaymentController::class,['names'=>'admin.channel.payments']);
    Route::resource('channels', ChannelController::class,['names'=>'admin.channels']);
    Route::resource('channle-posts', ChannelPostController::class,['names'=>'admin.channel.posts']);
    Route::resource('packages', PackageController::class,['names'=>'admin.packages']);
    Route::get('channel/packages/{user_id}', [ChannelController::class,'packages'])->name('packages');
    Route::get('channel/packages/edit/{user_id}', [ChannelController::class,'editPackage'])->name('packages.edit');
    Route::get('channel/packages/delete/{id}', [ChannelController::class,'deletePackage'])->name('packages.delete');
    Route::get('channel/packages/order/delete/{id}', [ChannelController::class,'deleteOrder'])->name('packages.order.delete');
    Route::get('channel/packages/order/{package_id}', [ChannelController::class,'packageOrders'])->name('package.orders');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::group(['middleware'=>['auth:sanctum','verified','auth',]],function(){
    Route::get('/', HomeComponent::class)->name('customer.home');

    Route::get('/channel/create', ChannelCreate::class);
    Route::get('channel/{slug}', ViewchannelComponent::class);
    Route::get('channel/payment/{userid}', ChannelPaymentComponent::class);
    Route::get('post/{slug}', PostComponent::class);
    Route::get('post/edit/{id}', EditPostComponent::class)->name('edit.post');
    Route::get('/packages', PackageComponent::class);
    Route::get('package/{slug}', PackageDetailsComponent::class);
    Route::get('packages/order', PackageOrderComponent::class);
    Route::get('packages/{id}', MyPackageOrderComponent::class);
    Route::get('package/ratting/{id}', RattingComponent::class);
    Route::get('package/payment/{id}', PackagePaymentComponent::class);
    Route::get('report/{post_id}', ReportComponent::class)->name('report');
    Route::get('channel-package/{slug}', PackagesForChannel::class);
    Route::get('/test1', Dropdowns::class);



});
