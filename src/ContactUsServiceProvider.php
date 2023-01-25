<?php
namespace YudizBhargav\ContactUs;

use Illuminate\Support\ServiceProvider;

class ContactUsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'contactUs');

    }
    public function register()
    {

    }
}
