<?php

namespace Sinevia\Object;

use Illuminate\Support\ServiceProvider;

class ObjectServiceProvider extends ServiceProvider {

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            $this->loadMigrationsFrom(dirname(__DIR__) . '/database/migrations'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
