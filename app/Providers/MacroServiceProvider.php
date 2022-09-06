<?php

namespace App\Providers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        RedirectResponse::macro(/**
         * Macro being used to redirect in case of success.
         * By default it will redirect back but you can specify to which route it should redirect as well as message.
         *
         * @param null|string $route
         * @param string $message
         * @return mixed
         */ 'success', function($route = null, string $message='Success!') {
            if ($route) {
                return redirect()
                    ->route($route)
                    ->with('success', $message);
            }

            return redirect()
                ->back()
                ->with('success', $message);
        });

        RedirectResponse::macro(/**
         * Macro being used to redirect in case of error.
         * By default it will redirect back but you can specify to which route it should redirect as well as message.
         *
         * @param null|string $route
         * @param string $message
         * @return mixed
         */ 'error', function($route = null, string $message='Error!') {
            if ($route) {
                return redirect()
                    ->route($route)
                    ->with('error', $message)
                    ->withInput(request()->all());
            }

            return redirect()
                ->back()
                ->with('error', $message)
                ->withInput(request()->all());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
