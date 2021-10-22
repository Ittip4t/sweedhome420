<?php

use App\Http\Controllers\ThPostalCodesController;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    $data = ['title'=>'Alien Woker','description' => 'Kuy', 'author'=>'lnwza007'];
    return view('dashboard.index',['data'=>$data]);
});
Route::group(['middleware' => ['guest:web']], function () {



    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('register', function () {
        return view('auth.register');
    })->name('register');

    Route::get('forgot-password', function () {
        return view('auth.passwords.email');
    })->name('password.request');

    Route::get('reset-password', function (Request $request) {
        return view('auth.passwords.reset', $request->only('token', 'email'));
    })->name('password.reset');
});

Route::group(['middleware' => ['auth:web']], function () {

    Route::get('email/verification-notification', function (Request $request) {
        // dd(url()->previous());
        if (!Auth::user()->email_verified_at) {
            return view('auth.verify');
        }
        if (strpos(url()->previous(), route('alien.home')) === false) {
            return redirect()->route('home');
        }
        return redirect()->route('alien.home');
    })->name('verification.notice');

    Route::group(['middleware' => ['verified']], function () {
        Route::get('/dashboard', function () {
            return view('home', ['username' => Auth::user()->username]);
        })->name('home');
        Route::get('profile/{user:username}',[UserController::class,'edit'])->name('profile');
    });

    
});




Route::group(['prefix' => 'alien', 'as' => 'alien.'], function () {


    Route::group(['middleware' => ['guest:web']], function () {

        Route::get('login', function () {
            return view('auth.login');
        })->name('login');

        Route::get('forgot-password', function () {
            return view('auth.passwords.email');
        })->name('password.request');
    });

    Route::group(['middleware' => ['auth:web', 'verified','role:super-admin|admin']], function () {
    // Route::group(['middleware' => ['auth:web', 'verified', 'auth.roleable']], function () {

        Route::get('/', function (User $user) {
            // dd($user->find(1)->getPermissionsViaRoles(),$user->hasPermissionTo('update-user') );
            // $role =DB::table('role_has_permissions')
            // ->join('roles',  'role_has_permissions.role_id' , '=' ,'roles.id')
            // ->join('permissions',  'role_has_permissions.permission_id' , '=' ,'permissions.id')
            // ->select('roles.name as role', 'permissions.name as permission')
            // ->get();
            // $users = User::with('roles')->get();
            // dd($role,$users[2]->roles()->first()->permissions );
            return view('alien.index');
        })->name('home');

        Route::get('profile/{user:username}',[UserController::class,'edit'])->name('profile');

        Route::resource('users', UserController::class)->except([
            'create', 'store', 'destroy','show','index'
        ])->scoped([
            'users' => 'username'
        ]);;

        Route::resource('postal-code',ThPostalCodesController::class);
        Route::post('postal-code',[ThPostalCodesController::class,'import'])->name('postal-code.import');

    });
});
