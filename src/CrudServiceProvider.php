<?php

namespace Abir\Crud;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider

{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','crud');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {

    }


}
