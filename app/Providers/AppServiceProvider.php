<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Validator;
use Sentinel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('erc20address', function($attribute, $value, $parameters, $validator) {

            function isAddress($address) {
                if (!preg_match('/^(0x)?[0-9a-f]{40}$/i', $address)) {
                    // check if it has the basic requirements of an address
                    return 0;
                } elseif (!preg_match('/^(0x)?[0-9a-f]{40}$/', $address) || preg_match('/^(0x)?[0-9a-fA-F]{40}$/', $address)) {
                    // If it's all small caps or all all caps, return true
                    return 1;
                }
            }

            if(isAddress($value) == 1){
                return true;
            }
            return false;

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
