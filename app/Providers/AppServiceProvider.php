<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Fortify::authenticateUsing(function (Request $request) {
            // $validated = $request->validate([
                
            // ]);
            Validator::make($request->only('username','password'), [
                'username' => ['required', 'string', 'max:255'],
                'password' => ['required'],
            ])->validated();
            $user = User::where('email', $request->username)
                ->orWhere('username', $request->username)
                ->first();
            if ($user &&
                Hash::check($request->password, $user->password)) {
                return $user;
            }
        });

        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                if(!$request->routeIs('alien.*')){
                    return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(route('home',[],false));
                }
                return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(route('alien.home',[],false));
                    // : redirect()->intended(Fortify::redirects('login'));
            }
        });

        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse {
            public function toResponse($request)
            {
                if(!$request->routeIs('alien.*')){
                    return $request->wantsJson()
                    ? new JsonResponse('', 201)
                    : redirect()->route('home');
                }
                return $request->wantsJson()
                    ? new JsonResponse('', 201)
                    : redirect()->route('alien.home');
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fortify::loginView(function () {
        //     return view('auth.login');
        // });
        // Fortify::registerView(function () {
        //     return view('auth.register');
        // });
        // Fortify::requestPasswordResetLinkView(function () {
        //     return view('auth.passwords.email');
        // });
        // Fortify::verifyEmailView(function () {
        //     return view('auth.verify');
        // });
    }
}
