<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Setting;

class CoinNamePriceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting =Setting::find(1);
        View::share('f_coin', 'Vcoin');
        View::share('s_coin', 'vnja');
        View::share('c_btc', $setting->btc_price);
        View::share('c_eth', $setting->eth_price);
        View::share('c_coin', $setting->rate);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {



    }
}
