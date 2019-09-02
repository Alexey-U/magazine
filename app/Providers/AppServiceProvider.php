<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

use Illuminate\Support\ServiceProvider;

use DB;

use App\User;

use Auth;

use App\Product;

use App\Category;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
       /* DB::listen(function ($query) {
            dump($query->sql);
            dump($query->bindings);
        });*/

       /* $userAll = User::all();
        

        View::share('userAll', $userAll);*/

        

        View::composer('*', function($view) {
            $view->with('auth', Auth::user());

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
